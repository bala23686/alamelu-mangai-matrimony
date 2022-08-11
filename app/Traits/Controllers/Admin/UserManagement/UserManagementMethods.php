<?php

namespace App\Traits\Controllers\Admin\UserManagement;

use App\Helpers\File\ImageUploadHelper\ImageUploadHelper;
use App\Http\Requests\UsersRequest\UserHoroscopeJathakamImageRequest;
use App\Http\Requests\UsersRequest\UserRegistrationRequest;
use App\Http\Requests\Website\Dashboard\DocumentUpload\AadharUploadRequest;
use App\Http\Requests\Website\Dashboard\DocumentUpload\CollegeTcUploadRequest;
use App\Http\Requests\Website\Dashboard\DocumentUpload\TenthUploadRequest;
use App\Http\Requests\Website\Dashboard\DocumentUpload\TwefthUploadRequest;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\BasicPreferenceDetailsRequest;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\ProfessionalPreferenceDetailsRequest;
use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\ReligiousPreferenceDetailsRequest;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\BasicDetailsRequest;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\FamilyDetailsRequest;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\NativeInfoRequest;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\ProfessionalDetailsRequest;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\ReligiousDetailsRequest;
use App\Http\Requests\Website\ProfilesRequest\ProfileImageRequest;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPhotoMaster\UserPhotoMaster;
use App\Models\User;
use App\Models\UserTransaction\UserTransaction;
use App\Services\UserPhotoUploadService\UserPhotoUploadService;
use App\Services\UserRegistrationService\UserRegistrationService;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\BasicPartnerPreferenceUpdateServices;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\ProfessionalPreferenceUpdateServices;
use App\Services\Website\DashboardServices\PartnerPreferenceServices\ReligiousPreferenceUpdateServices;
use App\Services\Website\DashboardServices\ProfileServices\BasicDetailsUpdateServices;
use App\Services\Website\DashboardServices\ProfileServices\FamilyDetailsUpdateServices;
use App\Services\Website\DashboardServices\ProfileServices\HoroscopeDetailsUpdateServices;
use App\Services\Website\DashboardServices\ProfileServices\NativeInfoUpdateServices;
use App\Services\Website\DashboardServices\ProfileServices\ProfessionalDetailsUpdateServices;
use App\Services\Website\DashboardServices\ProfileServices\ReligiousDetailsUpdateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

trait UserManagementMethods
{

    /**
     * users function handle ssr of user list
     *
     * @return User
     */
    public function users(Request $request)
    {

        $query = User::query()
            ->with(['userBasicInfo.Gender', 'userReligeonInfo', 'userNativeInfo', 'userPackageInfo.Package', 'status'])
            ->where('is_admin', 0);


        //section to filter by userStatus
        if ($request->has('userStatus') && $request->userStatus != 0) {

            $query->userStatus($request);
        }
        //end section to filter by userStatus

        //section to filter by caste
        if ($request->has('caste') && $request->caste != 0) {

            $query->casteFilter($request->caste);
        }
        //end section to filter by caste

        //section to filter by location
        if ($request->has('location') && $request->location != 0) {

            $query->locationFilter($request);
        }
        //end section to filter by location

        //section to filter by package
        if ($request->has('package') && $request->package != 0) {
            $query->userPackage($request);
        }
        //end section to filter by package

        //section to filter by martial-status
        if ($request->has('mstatus') && $request->mstatus != 0) {
            $query->martialFilter($request);
        }
        //end section to filter by martial-status

        //function that handles the height filter
        $this->filterByHeight($query, $request);

        //function that handle the age filter
        $this->filterByAge($query, $request);

        //section to global search on user table
        if ($request->has('searchQuery') && $request->searchQuery != '') {

            if ($request->userStatus != 0) {

                $query->SearchWithUserStatus($request);
            } else {

                $query->SearchWithOutUserStatus($request);
            }
        }
        //end section to global search on user table

        //section to filter gender
        if ($request->has('gender') && $request->gender != 0) {

            $query->GenderFilter($request->gender);
        }
        //end section to filter gender

        //final section to pagination
        $data = $query->orderBy('id', 'DESC')->paginate($request->input('perpage', 10));


        return response(json_encode($data, 200));
    }

    /**
     * filterByHeight function handle filter process of user list
     *
     * @return void
     */

    private function  filterByHeight($query, $request)
    {

        //section to filter height wise
        if ($request->minHeight != 0 && $request->maxHeight != 0) {
            $query->whereHas('userBasicInfo', function ($query) use ($request) {
                return $query->whereBetween('user_height_id', [$request->minHeight, $request->maxHeight]);
            });

            return;
        }

        if ($request->has('minHeight') && $request->minHeight != 0) {


            $query->whereHas('userBasicInfo', function ($query) use ($request) {
                return $query->whereBetween('user_height_id', [$request->minHeight, 42]);
            });

            return;
        }

        if ($request->has('maxHeight') && $request->maxHeight != 0) {

            $query->whereHas('userBasicInfo', function ($query) use ($request) {
                return $query->whereBetween('user_height_id', [1, $request->maxHeight]);
            });

            return;
        }
        //end section to filter height wise
        return;
    }

    /**
     * filterByAge function handle filter process of user list
     *
     * @return void
     */
    private function  filterByAge($query, $request)
    {

        //section to filter age wise
        if ($request->minage != 0 && $request->maxage != 0) {
            $query->whereHas('userBasicInfo', function ($query) use ($request) {
                return $query->whereBetween('age', [$request->minage, $request->maxage]);
            });

            return;
        }

        if ($request->has('minage') && $request->minage != 0) {


            $query->whereHas('userBasicInfo', function ($query) use ($request) {
                return $query->whereBetween('age', [$request->minage, 60]);
            });

            return;
        }

        if ($request->has('maxage') && $request->maxage != 0) {

            $query->whereHas('userBasicInfo', function ($query) use ($request) {
                return $query->whereBetween('age', [1, $request->maxage]);
            });

            return;
        }
        //end section to filter height wise
        return;
    }


    public function updateUserPassword(Request $request, $id)
    {

        $user = User::find($id)
            ->update(

                ['password' => Hash::make($request->newPassword)]
            );

        return $user ? response()->json(['message' => 'Password Updated'], 201) : response()->json(['message' => ''], 500);
    }


    public function updateVerificationStatus(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(

            ['is_verified' => ($user->is_verified == 1) ? 0 : 1]
        );

        return $user->save() ? response()->json(['message' => 'User Verification Status Updated'], 201) : response()->json(['message' => ''], 500);
    }

    /**
     * deleteUserProfileImage function
     * This function delete the user profile photo
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function deleteUserProfileImage(Request $request, $id)
    {



        $user = UserBasicInfoMaster::where('user_id', $id)->first();

        $user->user_profile_image = null;

        return $user->save() ? response()->json(['message' => 'User Profile Image Deleted'], 201) : response()->json(['message' => 'something went wrong'], 500);
    }

    public function userProfileImageUpload(ProfileImageRequest $request)
    {
        // $this->validate($request, [
        //     "profileImage" => 'required|file|mimes:png,jpg,jpeg|max:2048'
        // ]);

        $file = $request->profileImage;

        $fileName = ImageUploadHelper::storeImageWithWaterMark($file, UserBasicInfoMaster::USER_PROFILE_IMAGE_PATH);

        if ($request->is('api/*')) {
            $user = UserBasicInfoMaster::where('user_id', $request->user()->id)->update(["user_profile_image" => $fileName]);
            Cache::forget('user_basic_info' . $request->user()->id);
        } else {

            $user = UserBasicInfoMaster::where('user_id', $request->userId)->update(["user_profile_image" => $fileName]);
        }

        return $user ? response()->json(['message' => 'User Profile Image Updated'], 201) : response()->json(['message' => ''], 500);
    }


    public function updateUserBasicInformation(BasicDetailsRequest $request, BasicDetailsUpdateServices $service, $id)
    {
        return  $service->HandleBasicDetails($request, $id)
            ? response()->json(['message' => 'Basic Information Updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function uploadMedicalCertificate(Request $request, BasicDetailsUpdateServices $service, $id)
    {
        $this->validate($request, [
            'medical_certificate' => ['required']
        ]);



        $medical_certificate = ImageUploadHelper::storeImage($request->medical_certificate, UserBasicInfoMaster::USER_MEDICAL_CERIFICATE_IMAGE_PATH);

        return $service->handleMedicalCertificateUpload($medical_certificate, $id)
            ? response()->json(['message' => 'User Medical Certificate Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function uploadTenthCertificate(TenthUploadRequest $request, BasicDetailsUpdateServices $service, $id)
    {

        $tenth_certificate = ImageUploadHelper::storeImage($request->tenth_certificate, UserBasicInfoMaster::USER_TENTH_CERIFICATE_IMAGE_PATH);

        return $service->handleTenthCertificateUpload($tenth_certificate, $id)
            ? response()->json(['message' => 'User Tenth Certificate Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function uploadTwelthCertificate(TwefthUploadRequest $request, BasicDetailsUpdateServices $service, $id)
    {


        $twelth_certificate = ImageUploadHelper::storeImage($request->twelth_certificate, UserBasicInfoMaster::USER_TWELTH_CERIFICATE_IMAGE_PATH);

        return $service->handleTwelthCertificateUpload($twelth_certificate, $id)
            ? response()->json(['message' => 'User Twelth Certificate Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function uploadCollegeTc(CollegeTcUploadRequest $request, BasicDetailsUpdateServices $service, $id)
    {
        $this->validate($request, [
            'clg_tc' => ['required']
        ]);

        $clg_tc = ImageUploadHelper::storeImage($request->clg_tc, UserBasicInfoMaster::USER_CLG_TC_IMAGE_PATH);

        return $service->handleClgTcUpload($clg_tc, $id)
            ? response()->json(['message' => 'User College Tc Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function adharCardUpload(AadharUploadRequest $request, BasicDetailsUpdateServices $service, $id)
    {


        $user_adhar_card = ImageUploadHelper::storeImage($request->userAdharCard, UserBasicInfoMaster::USER_ADHAR_IMAGE_PATH);

        return $service->handleAdharCardUpload($user_adhar_card, $request->userAdharCardNo, $id)
            ? response()->json(['message' => 'User Adhar Card Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function updateUserFamilyInformation(FamilyDetailsRequest $request, FamilyDetailsUpdateServices $service, $id)
    {
        return $service->HandleUpdateFamilyDetails($request, $id)
            ? response()->json(['message' => 'Family Information Updated'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function registerNewUser(UserRegistrationRequest $request, UserRegistrationService $service)
    {

        //this function register a new User/Profile

        if ($service->HandleUserRegistration($request)) {
            $last_inserted_user_id = User::latest()->first()->id;

            return response()->json(['userId' => $last_inserted_user_id], 201);
        }
    }



    public function updateUserHoroscopeRasiKatam(Request $request, HoroscopeDetailsUpdateServices $service, $id)
    {

        return  $service->updateRasiKatamDetails($request, $id)
            ? response()->json(['message' => 'Rasi Katam  Updated'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function updateUserHoroscopeRasiNavamsam(Request $request, HoroscopeDetailsUpdateServices $service, $id)
    {
        return  $service->updateNavamsamKatamDetails($request, $id)
            ? response()->json(['message' => 'Navamsam Katam  Updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function updateUserHoroscopeImageUpload(UserHoroscopeJathakamImageRequest $request, HoroscopeDetailsUpdateServices $service, $id)
    {
        return  $service->updateJathakamImage($request, $id)
            ? response()->json(['message' => 'Jathaka Katam Image Uploaded'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function updateUserProfessionalInformation(ProfessionalDetailsRequest $request, ProfessionalDetailsUpdateServices $service, $id)
    {

        return  $service->HandleProfessionalDetailsUpdate($request, $id)
            ? response()->json(['message' => 'User Professional information updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function updateUserNativeInformation(NativeInfoRequest $request, NativeInfoUpdateServices $service, $id)
    {

        return  $service->HandleNativeDetailsUpdate($request, $id)
            ? response()->json(['message' => 'User Native information updated'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function updateUserReligiousInformation(ReligiousDetailsRequest $request, ReligiousDetailsUpdateServices $service, $id)
    {

        return  $service->HandleReligiousDetailsUpdate($request, $id)
            ? response()->json(['message' => 'User Religious information updated'], 201)
            : response()->json(['message' => ''], 500);
    }


    public function updateUserPrefferenceBasicInformation(BasicPreferenceDetailsRequest $request, BasicPartnerPreferenceUpdateServices $service, $id)
    {

        return  $service->HandleBasicPartnerPreferenceUpdate($request, $id)
            ? response()->json(['message' => 'User Basic Preferrence information updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function updateUserPrefferenceJobInformation(ProfessionalPreferenceDetailsRequest $request, ProfessionalPreferenceUpdateServices $service, $id)
    {
        return  $service->HandleProfessionalPreferenceUpdate($request, $id)
            ? response()->json(['message' => 'User Job Preferrence information updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function updateUserPrefferenceReligiousInformation(ReligiousPreferenceDetailsRequest $request, ReligiousPreferenceUpdateServices $service, $id)
    {
        return  $service->HandleReligiousPreferenceUpdate($request, $id)
            ? response()->json(['message' => 'User Religious Preferrence information updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    public function profileTransactionList($id)
    {

        return response(json_encode(UserTransaction::where('user_id', $id)->get()));
    }

    public function uploadMultipleImage(Request $request, UserPhotoUploadService $service)
    {

        $file_name = ImageUploadHelper::storeImage($request->file, UserPhotoMaster::IMAGE_UPLOAD_PATH);

        if ($service->handleUserPhotos($file_name, $request->user_id)) {

            return response(json_encode(["messsage" => "image uploaded succesfully"]), 200);
        } else {
            return response(json_encode(["message" => "You Need a Active Plan & photo count to upload more image"]), 402);
        }
    }


    public function getUserPhotos($id)
    {

        return  response(json_encode(UserPhotoMaster::where('user_id', $id)->where('user_photo_status', 1)->get()));
    }

    public function deletePhoto($id)
    {

        return UserPhotoMaster::destroy($id)
            ? response()->json(['message' => 'User Image Deleted Refresh to Update Screen'], 200)
            : response(json_encode(["message" => "something went wrong"]), 500);
    }
}

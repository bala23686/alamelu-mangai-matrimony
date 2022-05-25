<?php

namespace App\Services\UserRegistrationService;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\User;
use App\Events\UserCreated;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\UserTransaction\UserTransaction;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Helpers\Utility\InvoiceNumberHelper;
use App\Models\Master\PackageMaster\PackageMaster;

class UserRegistrationService
{


    public function  HandleUserRegistration(Request $request)
    {

        // ID GENERATE FOR MALE => RAMA & FEMALE => SITA
        $prefix = ($request->gender == 1) ? 'RAMA' : 'SITA';

        $user = new User;
        $user_profile_id = Helper::IDGenerator(new User, 'id', 4, $prefix);
        $user->username = $request->username;
        $user->phonenumber = $request->phonenumber;
        $user->email = $request->email;
        $user->password = Hash::make($request->input('password'));
        $user->user_profile_id = $user_profile_id;
        $user->save();

        $user_pref = new UserPreferenceInfo();
        $user_pref->user_id = $user->id;
        $user->userPreferrenceInfo()->save($user_pref);

        $user_prof = new UserProfessionalMaster();
        $user_prof->user_id = $user->id;
        $user->userProfessinalInfos()->save($user_prof);

        $user_native = new UserNativeInfoMaster();
        $user_native->user_id = $user->id;
        $user->userNativeInfo()->save($user_native);

        $user_horoscope = new UserHoroscopeInfoMaster();
        $user_horoscope->user_id = $user->id;
        $user->userHoroScopeInfo()->save($user_horoscope);

        $user_family = new UserFamilyInfoMaster();
        $user_family->user_id = $user->id;
        $user->userFamilyInfos()->save($user_family);

        $user_religion_info = new UserReligiousInfoMaster();
        $user_religion_info->user_id = $user->id;
        $user_religion_info->user_religion_id = $request->religion;
        $user_religion_info->user_caste_id = $request->caste;
        $user->userReligeonInfo()->save($user_religion_info);

        $user_package_info = new UserPackageInfoMaster();
        $user_package_info->user_id = $user->id;
        $user_package_info->user_package_id = 1;
        $user_package_info->expires_on = Carbon::now()->addDays(7);
        $user->userPackageInfo()->save($user_package_info);

        // $transaction = new UserTransaction();
        // $transaction->tr_id = InvoiceNumberHelper::GenerateInvoiceNumber();
        // $transaction->user_id = $user->id;
        // $transaction->tr_package_name = 'Basic Package';
        // $transaction->tr_package_price = 0;
        // $transaction->tr_amount_paid = 0;
        // $transaction->tr_package_views = 1;
        // $transaction->tr_package_photo_upload = 1;
        // $transaction->tr_package_interest = 1;
        // $transaction->tr_mode = 1;
        // $user->TransactionInfo()->save($transaction);

        $user_info = new UserBasicInfoMaster();
        $user_info->user_id = $user->id;
        $user_info->user_full_name = $request->username;
        $user_info->user_mobile_no = $request->phonenumber;
        $user_info->dob = $request->dob;
        $user_info->gender_id = $request->gender;
        $is_registered = $user->userBasicInfo()->save($user_info);

        //Fire Welcome Mail Event
        // event(new UserCreated($user));
        return  $is_registered ? true : false;
    }
}

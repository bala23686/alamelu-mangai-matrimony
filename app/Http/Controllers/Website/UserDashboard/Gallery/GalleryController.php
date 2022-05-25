<?php

namespace App\Http\Controllers\Website\UserDashboard\Gallery;

use App\Helpers\File\ImageUploadHelper\ImageUploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPhotoMaster\UserPhotoMaster;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galleryInfo = [
            'packageInfo' => UserPackageInfoMaster::where('user_id', $id)->first(),
            'imageInfo' => UserPhotoMaster::where('user_id', $id)->get(),
        ];

        // dump($galleryInfo);

        return view('Website.userDashboard.myGallery', $galleryInfo)->with('user', auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Update the specified user image from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userImageUpload(Request $request, $id)
    {
        $package_info = UserPackageInfoMaster::where('user_id', $id)->first();
        $remainImageCount = $package_info->photo_upload_remaining;

        if ($remainImageCount > 0) {

            $request->validate([
                'profileImage' => 'required|image|mimes:jpg,png,jpeg|max:2048' // Only allow .jpg, .bmp and .png file types.
            ]);

            try {
                $file = $request->profileImage;
                $imageUploader = new ImageUploadHelper();
                $filename = $imageUploader->storeImageWithWaterMark($file, UserPhotoMaster::IMAGE_UPLOAD_PATH);

                $user_image =  new UserPhotoMaster();
                $user_image->user_id = $id;
                $user_image->user_photo = $filename;
                $user_image->save();

                $package_info->photo_upload_remaining = $package_info->photo_upload_remaining - 1;
                $package_info->save();

                return response(["message" => "User Profile Image Updated!", "file" => $filename, 'status' => 200]);
            } catch (\Throwable $th) {
                return response($th);
            }
        } else {
            return response(["message" => "Upgrade Your Package To Add More Photos !", 'status' => 500]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_info = UserPhotoMaster::where('id', $id)->first();

        $image_path = UserBasicInfoMaster::USER_PROFILE_IMAGE_PATH;

        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        $user_info->delete();

        $package_info = UserPackageInfoMaster::where('user_id', $user_info->user_id)->first();
        $package_info->photo_upload_remaining = $package_info->photo_upload_remaining + 1;
        $package_info->save();

        return response(['message' => 'User Profile Image deleted successfully!', 'status' => 200]);
    }
}

<?php

namespace App\Helpers\File\ImageUploadHelper;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageIntervention;


class ImageUploadHelper
{

    public static function storeImageWithWaterMark($file, string $path): string
    {

        $image = $file;
        $input['file'] = time() . '.' . $image->getClientOriginalExtension();

        $imgFile = ImageIntervention::make($file->getRealPath());

        $imgFile->insert('assets/admin/images/exciteon-logo.png', 'bottom');

        $imgFile->resize(500, 500);

        Storage::disk('uploads')->put($path . '/' . $input['file'], $imgFile->encode());

        return $input['file'];
    }


    public static function storeImage($file, string $path): string
    {

        $fileName = "dummy" . "" . round(time() / 9999) . "" . rand(10, 500) . "." . $file->getClientOriginalExtension();
        Storage::disk('uploads')->putFileAs($path, $file, $fileName);
        return $fileName;
    }
}

<?php

namespace App\Models\Master\UserPhotoMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhotoMaster extends Model
{
    use HasFactory;

    public const IMAGE_UPLOAD_PATH="/user-image/";

    protected $fillable = ['user_id','user_photo', 'user_photo_status'];

    protected $appends=['image_full_path'];
    protected $casts=[
        "created_at"=>"date:d-M-Y"
    ];


    public function getImageFullPathAttribute()
    {
        return  Url('/') . '/uploads'.self::IMAGE_UPLOAD_PATH . "{$this->user_photo}";
    }
}

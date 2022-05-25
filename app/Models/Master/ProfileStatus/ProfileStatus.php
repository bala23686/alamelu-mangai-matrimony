<?php

namespace App\Models\Master\ProfileStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileStatus extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'profile_statuses';


    protected $fillable = [
        'profile_status_name',
        'profile_status_status',
    ];
}

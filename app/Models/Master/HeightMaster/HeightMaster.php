<?php

namespace App\Models\Master\HeightMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeightMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['height_feet_cm', 'height_status'];
}

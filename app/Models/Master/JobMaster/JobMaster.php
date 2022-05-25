<?php

namespace App\Models\Master\JobMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'job_name',
        'job_status'
    ];
}

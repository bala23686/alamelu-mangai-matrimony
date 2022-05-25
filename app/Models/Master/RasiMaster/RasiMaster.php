<?php

namespace App\Models\Master\RasiMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RasiMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['rasi_name', 'rasi_status'];
}

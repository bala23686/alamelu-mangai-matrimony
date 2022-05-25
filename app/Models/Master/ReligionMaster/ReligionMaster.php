<?php

namespace App\Models\Master\ReligionMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReligionMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['religion_name', 'religion_status'];

}

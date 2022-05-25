<?php

namespace App\Models\Master\UserShowInterestInfoMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShowInterestInfoMaster extends Model
{
    use HasFactory;
    protected $fillable = ['user_interested_acceptance'];
}

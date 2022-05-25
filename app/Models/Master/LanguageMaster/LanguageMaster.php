<?php

namespace App\Models\Master\LanguageMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['language_name', 'language_status'];
}

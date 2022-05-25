<?php

namespace App\Models\SubMaster\MartialStatusSubMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MartialStatusSubMaster extends Model
{
    use HasFactory;    protected $fillable = ['martial_status_name', 'martial_status_status'];

}

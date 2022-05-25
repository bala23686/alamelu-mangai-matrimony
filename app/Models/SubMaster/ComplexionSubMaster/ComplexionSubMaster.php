<?php

namespace App\Models\SubMaster\ComplexionSubMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplexionSubMaster extends Model
{
    use HasFactory;
    
    protected $fillable = ['complexion_name', 'complexion_status'];
}

<?php

namespace App\Models\SubMaster\FamilyStatusSubMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyStatusSubMaster extends Model
{
    use HasFactory;
    protected $fillable = ['family_type_name', 'family_type_status'];
}

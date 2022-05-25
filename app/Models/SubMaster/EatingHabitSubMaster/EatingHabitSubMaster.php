<?php

namespace App\Models\SubMaster\EatingHabitSubMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EatingHabitSubMaster extends Model
{
    use HasFactory;
    protected $fillable = ['habit_type_name', 'habit_status'];
}

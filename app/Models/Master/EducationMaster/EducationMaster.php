<?php

namespace App\Models\Master\EducationMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationMaster extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['education_name', 'education_status'];

    public function Education()
    {
        return $this->hasMany(UserProfessionalMaster::class, 'education_id', 'id');
    }

    public $dates = [
        'created_at',
        'deleted_at',
    ];
}

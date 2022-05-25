<?php

namespace App\Models\Master\CasteMaster;

use App\Models\Master\ReligionMaster\ReligionMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CasteMaster extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'caste_name',
        'caste_status',
        'caste_religion'
    ];

    public function Religion()
    {
        return $this->belongsTo(ReligionMaster::class,'caste_religion','id');
    }
}

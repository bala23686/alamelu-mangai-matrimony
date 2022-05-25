<?php

namespace App\Models\Master\StarMaster;

use App\Models\Master\RasiMaster\RasiMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StarMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'star_name',
        'star_status',
        'star_rasi_id'
    ];


    public function Rasi()
    {
        return $this->belongsTo(RasiMaster::class,'star_rasi_id','id');
    }

}

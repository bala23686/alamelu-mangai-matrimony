<?php

namespace App\Models\Master\StateMaster;

use App\Models\Master\CountryMaster\CountryMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
     'state_name',
     'state_status',
     'country_id',
    ];


    public function Country()
    {
        return $this->belongsTo(CountryMaster::class,'country_id','id');
    }
}

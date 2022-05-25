<?php

namespace App\Models\Master\HoroScopeMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoroScopeMaster extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="horo_scope_masters";

    protected $fillable=[
        'horoscope_name',
        'horoscope_status',
    ];
}

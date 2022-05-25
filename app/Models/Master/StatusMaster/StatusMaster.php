<?php

namespace App\Models\Master\StatusMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusMaster extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="status_masters";


    protected $fillable=[
        'status_name',
        'status_status',
    ];
}

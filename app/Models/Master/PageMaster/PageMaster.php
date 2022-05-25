<?php

namespace App\Models\Master\PageMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['page_name', 'page_slug'];
}

<?php

namespace App\Models\SubMaster\SalarySubMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySubMaster extends Model
{
    use HasFactory;
    protected $fillable = ['salary_amount', 'salary_status'];

}

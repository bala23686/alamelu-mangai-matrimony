<?php

namespace App\Models\ProductSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSetting extends Model
{
    use HasFactory;


    protected $table='product_settings';

    protected $fillable=[
        'setting_name',
        'value'
    ];

}

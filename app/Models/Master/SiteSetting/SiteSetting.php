<?php

namespace App\Models\Master\SiteSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = ['brand_name', 'brand_logo', 'brand_email', 'brand_contact_no_1', 'brand_contact_no_2', 'brand_location', 'brand_theme_primary', 'brand_theme_secondary'];
}

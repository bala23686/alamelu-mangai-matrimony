<?php

namespace App\Helpers\Utility;

use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use Hamcrest\Type\IsNumeric;

class PackageHelper
{

    public static function get_remaining_package_value($id, $column_name)
    {
        $value = UserPackageInfoMaster::where('user_id', $id)->first()->$column_name;
        // dd($value);
        return $value;
    }
    public static function get_package_value($id, $column_name)
    {
        $value = PackageMaster::where('id', $id)->first()->$column_name;
        // dd($value);
        return $value;
    }
    public static function package_validity($id)
    {
        $validity = UserPackageInfoMaster::where('user_id', $id)->first()->expires_on;
        // $expires_on = $validity->expires_on;
        $today = date("Y-m-d");
        // dd($validity);
        // dd($today);
        if ($validity == null || ($validity = $today)) {
            return 1;
        } else {
            return 0;
        }
    }
    public static function filter_min_value($value)
    {
        return empty($value) || !is_numeric($value) || $value <= 0.00 ?: $value;
    }
}

<?php

namespace App\Helpers;

use App\Models\ProductSetting\ProductSetting;

class Helper
{

    public static function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();

        if (!$data) {
            $og_length = $length;
            $last_number = '';
        } else {
            // $code = substr($data->$trow, strlen($prefix) + 1);
            // $actual_last_number = ($code / 1) * 1;

            $increment_last_number = ((int)$data->$trow) + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }
        return $prefix . date('my') . $zeros . $last_number;
    }
    public static function get_settings($name)
    {
        $config = null;
        $data = ProductSetting::where(['setting_name' => $name])->first();
        if (isset($data)) {
            $config = json_decode($data['value'], true);
            if (is_null($config)) {
                $config = $data['value'];
            }
        }
        return $config;
    }
}

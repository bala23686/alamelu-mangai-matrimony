<?php

namespace App\Helpers;

use App\Models\ProductSetting\ProductSetting;
use App\Models\User;
use DateTime;

class Helper
{

    public static function IDGenerator($model, $trow, $length = 10, $prefix)
    {

        try {

            $current_date_time = new DateTime();

            $date_sequence = $current_date_time->format("dmy");

            //section generate the sequence of running number of trip sheet

            $lastTransactionId = User::orderBy('id', 'desc')->first();

            if (!$lastTransactionId)
                // We get here if there is no TripSheet at all
                // If there is no Trip sheet number set it to 0, which will be 1 at the end.
                $number = 0;
            else

                $number = substr($lastTransactionId->user_profile_id, 10);


            return  $prefix . $date_sequence . sprintf('%03d', intval($number) + 1);
        } catch (\Exception $e) {
            dd($e);
        }
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

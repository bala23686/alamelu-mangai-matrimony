<?php

namespace Database\Seeders;

use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use Illuminate\Database\Seeder;

class HoroScopeMasterSeeder extends Seeder
{



    public $horoscope_master_list = [
        'சூ',
        'ச',
        'பு',
        'சுக்',
        'செவ்',
        'குரு',
        'சனி',
        'ல',
        'ரா',
        'கே',

        // 'Sun-(சூரியன்)',
        // 'Moon-(நிலா)',
        // 'Mercury-(புதன்)',
        // 'Venus-(வெள்ளி)',
        // 'Mars-(செவ்வாய்)',
        // 'Jupiter-(வியாழன்)',
        // 'Saturn-(சனி)',
        // 'Ascendant-(ல)',
        // 'Rahu-(ராகு)',
        // 'Ketu-(கேது)',

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->horoscope_master_list); $i < $length; $i++) {
            $horoscope = new HoroScopeMaster();
            $horoscope->horoscope_name= $this->horoscope_master_list[$i];
            $horoscope->save();
        }
    }
}

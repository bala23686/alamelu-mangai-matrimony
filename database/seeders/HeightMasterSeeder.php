<?php

namespace Database\Seeders;

use App\Models\Master\HeightMaster\HeightMaster;
use Illuminate\Database\Seeder;

class HeightMasterSeeder extends Seeder
{

    public $height_master_list = [
        "4 ft or 121 cm",
        "4 ft 1 in  or 124 cm",
        "4 ft 2 in or 127 cm",
        "4 ft 3 in or 129 cm",
        "4 ft 4 in or 132 cm",
        "4 ft 5 in or 134 cm",
        "4 ft 6 in or 137 cm",
        "4 ft 7 in or 139 cm",
        "4 ft 8 in or 142 cm",
        "4 ft 9 in or 144 cm",
        "4 ft 10 in or 147 cm",
        "4 ft 11 in or 149 cm",
        "5 ft or 152 cm",
        "5 ft 1 in or 154 cm",
        "5 ft 2 in or 157 cm",
        "5 ft 3 in or 160 cm",
        "5 ft 4 in or 162 cm",
        "5 ft 5 in or 165 cm",
        "5 ft 6 in or 167 cm",
        "5 ft 7 in or 170 cm",
        "5 ft 8 in or 172 cm",
        "5 ft 9 in or 175 cm",
        "5 ft 10 in or 177 cm",
        "5 ft 11 in or 180 cm",
        "6 ft or 182 cm",
        "6 ft 1 in or 185 cm",
        "6 ft 2 in or 187 cm",
        "6 ft 3 in or 190 cm",
        "6 ft 4 in or 193 cm",
        "6 ft 5 in or 195 cm",
        "6 ft 6 in or 198 cm",
        "6 ft 7 in or 200 cm",
        "6 ft 8 in or 203 cm",
        "6 ft 9 in or 205 cm",
        "6 ft 10 in or 208 cm",
        "6 ft 11 in or 210 cm",
        "7 ft or 213.4 cm",
        "7 ft 1 in or 215 cm",
        "7 ft 2 in or 218 cm",
        "7 ft 3 in or 220 cm",
        "7 ft 4 in or 223 cm",
        "7 ft 5 in or 226 cm",
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->height_master_list); $i < $length; $i++) {
            $height = new HeightMaster();
            $height->height_feet_cm = $this->height_master_list[$i];
            $height->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Master\RasiMaster\RasiMaster;
use Illuminate\Database\Seeder;

class RasiMasterSeeder extends Seeder
{

    public $rasi_master_list = [
        'Aries-(மேஷம்)',
        'Taurus-(ரிஷபம்)',
        'Gemini-(மிதுனம்)',
        'Cancer-(கடகம்)',
        'Leo-(சிம்மம்)',
        'Virgo-(கன்னி)',
        'Libra-(துலாம்)',
        'Scorpio-(விருச்சிகம்)',
        'Sagittarius-(தனுசு)',
        'Aquarius-(கும்பம்)',
        'Pisces-(மீனம்)',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->rasi_master_list); $i < $length; $i++) {
            $rasi = new RasiMaster();
            $rasi->rasi_name= $this->rasi_master_list[$i];
            $rasi->save();
        }
    }
}

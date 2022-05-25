<?php

namespace Database\Seeders;

use App\Models\Master\StarMaster\StarMaster;
use Illuminate\Database\Seeder;

class StarMasterSeeder extends Seeder
{

    public $star_master_list = [
        ["star_name"=>"Ashwini-(அசுவினி)","star_rasi_id"=>1],
        ["star_name"=>"Barani-(பரணி)","star_rasi_id"=>1],
        ["star_name"=>"Kirithigai-(கிருத்திகை)","star_rasi_id"=>1],
        ["star_name"=>"Kirithigai-(கிருத்திகை)","star_rasi_id"=>2],
        ["star_name"=>"Roghini-(ரோகிணி)","star_rasi_id"=>2],
        ["star_name"=>"Mirugasirisam-(மிருகசிரீஷம்)","star_rasi_id"=>2],
        ["star_name"=>"Mirugasirisam-(மிருகசிரீஷம்)","star_rasi_id"=>3],
        ["star_name"=>"Thiruvathirai-(திருவாதிரை)","star_rasi_id"=>3],
        ["star_name"=>"Punarpusham-(புனர்பூசம்)","star_rasi_id"=>3],
        ["star_name"=>"Punarpusham-(புனர்பூசம்)","star_rasi_id"=>4],
        ["star_name"=>"Pusham-(பூசம்)","star_rasi_id"=>4],
        ["star_name"=>"Ayiliyam-(ஆயில்யம்)","star_rasi_id"=>4],
        ["star_name"=>"Magam-(மகம்)","star_rasi_id"=>5],
        ["star_name"=>"Puram-(பூரம்)","star_rasi_id"=>5],
        ["star_name"=>"Uthiram-(உத்திரம்)","star_rasi_id"=>5],
        ["star_name"=>"Uthiram-(உத்திரம்)","star_rasi_id"=>6],
        ["star_name"=>"Astham-(அஸ்தம்)","star_rasi_id"=>6],
        ["star_name"=>"Sithirai-(சித்திரை)","star_rasi_id"=>6],
        ["star_name"=>"Sithirai-(சித்திரை)","star_rasi_id"=>7],
        ["star_name"=>"Swathi-(சுவாதி)","star_rasi_id"=>7],
        ["star_name"=>"Visagam-(விசாகம்)","star_rasi_id"=>7],
        ["star_name"=>"Visagam-(விசாகம்)","star_rasi_id"=>8],
        ["star_name"=>"Anusam-(அனுஷம்)","star_rasi_id"=>8],
        ["star_name"=>"Kottai-(கேட்டை)","star_rasi_id"=>8],
        ["star_name"=>"Mulam-(முலம்)","star_rasi_id"=>9],
        ["star_name"=>"Puratam-(பூராடம்)","star_rasi_id"=>9],
        ["star_name"=>"Uthiratam-(உத்திராடம்)","star_rasi_id"=>9],
        ["star_name"=>"Uthiratam-(உத்திராடம்)","star_rasi_id"=>10],
        ["star_name"=>"Thiruvonam-(திருவோணம்)","star_rasi_id"=>10],
        ["star_name"=>"Avitam-(அவிட்டம்)","star_rasi_id"=>10],
        ["star_name"=>"Puratathi-(பூரட்டாதி)","star_rasi_id"=>11],
        ["star_name"=>"Uthiratadhi-(உத்திரட்டாதி)","star_rasi_id"=>11],
        ["star_name"=>"Revathi-(ரேவதி)","star_rasi_id"=>11]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->star_master_list); $i < $length; $i++) {
            $star = new StarMaster();
            $star->star_name = $this->star_master_list[$i]['star_name'];
            $star->star_rasi_id = $this->star_master_list[$i]['star_rasi_id'];
            $star->save();
        }
    }
}

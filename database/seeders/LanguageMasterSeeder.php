<?php

namespace Database\Seeders;

use App\Models\Master\LanguageMaster\LanguageMaster;
use Illuminate\Database\Seeder;

class LanguageMasterSeeder extends Seeder
{

    public $language_master_list = [
        'Tamil',
        'English',
        'Kannada',
        'Telugu',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->language_master_list); $i < $length; $i++) {
            $language = new LanguageMaster();
            $language->language_name= $this->language_master_list[$i];
            $language->save();
        }
    }
}

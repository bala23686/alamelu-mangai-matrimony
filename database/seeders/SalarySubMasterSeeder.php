<?php

namespace Database\Seeders;

use App\Models\SubMaster\SalarySubMaster\SalarySubMaster;
use Illuminate\Database\Seeder;

class SalarySubMasterSeeder extends Seeder
{

    public $salary_sub_master_list = [
        'Less than 1-lkh',
        '1-2lkh',
        '2-3lkh',
        '3-4lkh',
        '4-5lkh',
        '5-6lkh',
        '6-7lkh',
        '7-8lkh',
        '8-9lkh',
        '9-10lkh',
        '10-12lkh',
        '12-15lkh',
        'More than 15-lkh',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->salary_sub_master_list); $i < $length; $i++) {
            $salary = new SalarySubMaster();
            $salary->salary_amount= $this->salary_sub_master_list[$i];
            $salary->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\SubMaster\EatingHabitSubMaster\EatingHabitSubMaster;
use Illuminate\Database\Seeder;

class EatingHabitSubMasterSeeder extends Seeder
{

    public $eating_habits_list = [
        'Vegetarian'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->eating_habits_list); $i < $length; $i++) {
            $eating_habit = new EatingHabitSubMaster();
            $eating_habit->habit_type_name= $this->eating_habits_list[$i];
            $eating_habit->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'username' => 'Exciteon Admin',
            'email' => 'admin@exciteon.com',
            'phonenumber' => '123456789',
            'password' => Hash::make('1234'),
            'is_admin' => 1
        ]);

        $this->call(ProfileStatusSeeder::class);
        $this->call(PackageMasterSeeder::class);
        $this->call(StatusMasterSeeder::class);


        $this->call(GenderMasterSeeder::class);
        $this->call(FamilyStatusSubMasterSeeder::class);
        $this->call(EatingHabitSubMasterSeeder::class);
        $this->call(MartialStatusSubMasterSeeder::class);
        $this->call(SalarySubMasterSeeder::class);
        $this->call(ComplexionSubMasterSeeder::class);
        $this->call(LanguageMasterSeeder::class);
        $this->call(JobMasterSeeder::class);
        $this->call(HeightMasterSeeder::class);
        $this->call(EducationMasterSeeder::class);

        $this->call(ReligionMasterSeeder::class);
        $this->call(CasteMasterSeeder::class);

        $this->call(CountryMasterSeeder::class);
        $this->call(StateMasterSeeder::class);
        $this->call(CityMasterSeeder::class);

        $this->call(RasiMasterSeeder::class);
        $this->call(StarMasterSeeder::class);
        $this->call(HoroScopeMasterSeeder::class);


        $this->call(UserSeeder::class);
        $this->call(ProductSettingSeeder::class);
        $this->call(UserTransactionSeeder::class);

        $this->call(PaymentGateWaySeeder::class);
    }
}

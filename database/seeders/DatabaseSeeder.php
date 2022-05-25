<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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

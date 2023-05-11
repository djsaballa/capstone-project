<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SecurityLevelSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\DivisionSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\LocaleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DiseaseSeeder;
use Database\Seeders\MedicalCategorySeeder;
use Database\Seeders\ClientProfileSeeder;
use Database\Seeders\FamilyCompositionSeeder;
use Database\Seeders\MedicalConditionSeeder;
use Database\Seeders\MedicalOperationSeeder;
use Database\Seeders\ProgressReportSeeder;
use Database\Seeders\InboxSeeder;
use Database\Seeders\HistorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SecurityLevelSeeder::class,
            RoleSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            LocaleSeeder::class,
            UserSeeder::class,
            DiseaseSeeder::class,
            MedicalCategorySeeder::class,
            ClientProfileSeeder::class,
            FamilyCompositionSeeder::class,
            MedicalConditionSeeder::class,
            MedicalOperationSeeder::class,
            ProgressReportSeeder::class,
            InboxSeeder::class,
            HistorySeeder::class
        ]);
    }
}

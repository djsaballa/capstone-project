<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalCategory;

class MedicalCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/medical_categories.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                MedicalCategory::create([
                    "medical_category" => $data['0'],
                    "priority_level" => $data['1'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

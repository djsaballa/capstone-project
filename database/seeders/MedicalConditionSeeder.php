<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalCondition;

class MedicalConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/medical_conditions.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                MedicalCondition::create([
                    "since_when" => $data['0'],
                    "medicine_supplements" => $data['1'],
                    "dosage" => $data['2'],
                    "frequency" => $data['3'],
                    "doctor" => $data['4'],
                    "hospital" => $data['5'],
                    "client_profile_id" => $data['6'],
                    "disease_id" => $data['7'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

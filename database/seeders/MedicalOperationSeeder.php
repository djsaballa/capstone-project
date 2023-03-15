<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalOperation;

class MedicalOperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/medical_operations.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                MedicalOperation::create([
                    "operation" => $data['0'],
                    "date" => $data['1'],
                    "medical_condition_id" => $data['2'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

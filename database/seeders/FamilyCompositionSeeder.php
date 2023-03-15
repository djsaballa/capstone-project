<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FamilyComposition;

class FamilyCompositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/family_compositions.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                FamilyComposition::create([
                    "first_name" => $data['0'],
                    "middle_name" => $data['1'],
                    "last_name" => $data['2'],
                    "relationship" => $data['3'],
                    "educational_attainment" => $data['4'],
                    "occupation" => $data['5'],
                    "contact_number" => $data['6'],
                    "client_profile_id" => $data['7'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

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
                    "name" => $data['0'],
                    "relationship" => $data['1'],
                    "educational_attainment" => $data['2'],
                    "occupation" => $data['3'],
                    "contact_number" => $data['4'],
                    "client_profile_id" => $data['5'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

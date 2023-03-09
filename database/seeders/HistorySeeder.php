<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\History;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/histories.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                History::create([
                    "action_taken" => $data['0'],
                    "date" => $data['1'],
                    "employee_id" => $data['2'],
                    "client_profile_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

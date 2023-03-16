<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgressReport;

class ProgressReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/progress_reports.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                ProgressReport::create([
                    "date_time" => $data['0'],
                    "assignee_employee_id" => $data['1'],
                    "assignee_contact_number" => $data['2'],
                    "case_note" => $data['3'],
                    "remarks" => $data['4'],
                    "attachment" => $data['5'],
                    "client_profile_id" => $data['6'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

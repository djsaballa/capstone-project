<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/employees.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                if (!empty($data['7'])) {
                   $data7 = $data['7'];
                } else {
                    $data7 = null;
                }
                if (!empty($data['8'])) {
                    $data8 = $data['8'];
                } else {
                    $data8 = null;
                }
                if (!empty($data['9'])) {
                    $data9 = $data['9'];
                } else {
                    $data9 = null;
                }

                Employee::create([
                    "first_name" => $data['0'],
                    "middle_name" => $data['1'],
                    "last_name" => $data['2'],
                    "username" => $data['3'],
                    "password" => $data['4'],
                    "contact_number" => $data['5'],
                    "role_id" => $data['6'],
                    "locale_id" => $data7,
                    "district_id" => $data8,
                    "division_id" => $data9
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

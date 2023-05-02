<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/users.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                if (!empty($data['1'])) {
                    $data1 = $data['1'];
                 } else {
                     $data1 = null;
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
                if (!empty($data['10'])) {
                    $data10 = $data['10'];
                } else {
                    $data10 = null;
                }

                User::create([
                    "first_name" => $data['0'],
                    "middle_name" => $data1,
                    "last_name" => $data['2'],
                    "username" => $data['3'],
                    "password" => Hash::make($data['4']),
                    "contact_number" => $data['5'],
                    "status" => $data['6'],
                    "role_id" => $data['7'],
                    "locale_id" => $data8,
                    "district_id" => $data9,
                    "division_id" => $data10
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

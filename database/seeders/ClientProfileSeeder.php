<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClientProfile;

class ClientProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/client_profiles.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                ClientProfile::create([
                    "first_name" => $data['0'],
                    "middle_name" => $data['1'],
                    "last_name" => $data['2'],
                    "gender" => $data['3'],
                    "age" => $data['4'],
                    "birthdate" => $data['5'],
                    "occupation" => $data['6'],
                    "height" => $data['7'],
                    "weight" => $data['8'],
                    "baptism_date" => $data['9'],
                    "contact_person1_name" => $data['10'],
                    "contact_person1_contact_number" => $data['11'],
                    "contact_person2_name" => $data['12'],
                    "contact_person2_contact_number" => $data['13'],
                    "background_info" => $data['14'],
                    "background_info_attachment" => $data['15'],
                    "action_taken" => $data['16'],
                    "action_taken_attachment" => $data['17'],
                    "locale_servant_remark" => $data['18'],
                    "district_servant_remark" => $data['19'],
                    "division_servant_remark" => $data['20'],
                    "social_worker_recommendation" => $data['21'],
                    "status" => $data['22'],
                    "medical_category_id" => $data['23'],
                    "locale_id" => $data['24']
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);

    }
}

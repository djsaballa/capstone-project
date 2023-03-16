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
                    "address" => $data['3'],
                    "gender" => $data['4'],
                    "contact_number" => $data['5'],
                    "age" => $data['6'],
                    "birth_date" => $data['7'],
                    "occupation" => $data['8'],
                    "height" => $data['9'],
                    "weight" => $data['10'],
                    "baptism_date" => $data['11'],
                    "contact_person1_name" => $data['12'],
                    "contact_person1_contact_number" => $data['13'],
                    "contact_person2_name" => $data['14'],
                    "contact_person2_contact_number" => $data['15'],
                    "background_info" => $data['16'],
                    "background_info_attachment" => $data['17'],
                    "action_taken" => $data['18'],
                    "action_taken_attachment" => $data['19'],
                    "locale_servant_remark" => $data['20'],
                    "district_servant_remark" => $data['21'],
                    "division_servant_remark" => $data['22'],
                    "social_worker_recommendation" => $data['23'],
                    "status" => $data['24'],
                    "employee_encoder_id" => $data['25'],
                    "locale_id" => $data['26']
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);

    }
}

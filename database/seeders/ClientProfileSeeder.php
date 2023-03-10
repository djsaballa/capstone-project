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
                    "age" => $data['5'],
                    "birth_date" => $data['6'],
                    "occupation" => $data['7'],
                    "height" => $data['8'],
                    "weight" => $data['9'],
                    "baptism_date" => $data['10'],
                    "contact_person1_name" => $data['11'],
                    "contact_person1_contact_number" => $data['12'],
                    "contact_person2_name" => $data['13'],
                    "contact_person2_contact_number" => $data['14'],
                    "background_info" => $data['15'],
                    "background_info_attachment" => $data['16'],
                    "action_taken" => $data['17'],
                    "action_taken_attachment" => $data['18'],
                    "locale_servant_remark" => $data['19'],
                    "district_servant_remark" => $data['20'],
                    "division_servant_remark" => $data['21'],
                    "social_worker_recommendation" => $data['22'],
                    "status" => $data['23'],
                    "employee_encoder_id" => $data['24'],
                    "locale_id" => $data['25']
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);

    }
}

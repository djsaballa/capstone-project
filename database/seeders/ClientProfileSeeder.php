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
                    "privacy_consent" => $data['0'],
                    "first_name" => $data['1'],
                    "middle_name" => $data['2'],
                    "last_name" => $data['3'],
                    "address" => $data['4'],
                    "gender" => $data['5'],
                    "contact_number" => $data['6'],
                    "age" => $data['7'],
                    "birth_date" => $data['8'],
                    "occupation" => $data['9'],
                    "height" => $data['10'],
                    "weight" => $data['11'],
                    "baptism_date" => $data['12'],
                    "philhealth_member" => $data['13'],
                    "health_card" => $data['14'],
                    "contact_person1_name" => $data['15'],
                    "contact_person1_contact_number" => $data['16'],
                    "contact_person2_name" => $data['17'],
                    "contact_person2_contact_number" => $data['18'],
                    "background_info" => $data['19'],
                    "background_info_attachment" => $data['20'],
                    "action_taken" => $data['21'],
                    "action_taken_attachment" => $data['22'],
                    "locale_servant_remark" => $data['23'],
                    "district_servant_remark" => $data['24'],
                    "division_servant_remark" => $data['25'],
                    "social_worker_recommendation" => $data['26'],
                    "status" => $data['27'],
                    "user_encoder_id" => $data['28'],
                    "locale_id" => $data['29']
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);

    }
}

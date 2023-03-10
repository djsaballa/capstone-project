<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inbox;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/seeders/seeds/inboxes.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Inbox::create([
                    "checked" => $data['0'],
                    "content" => $data['1'],
                    "date_sent" => $data['2'],
                    "sender_employee_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

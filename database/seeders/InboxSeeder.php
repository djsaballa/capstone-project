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
                    "content" => $data['0'],
                    "date_sent" => $data['1'],
                    "sender_user_id" => $data['2'],
                    "receiver_user_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}

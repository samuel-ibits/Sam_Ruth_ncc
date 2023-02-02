<?php

use App\AntennaMake;
use Illuminate\Database\Seeder;

class AntennaMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $antennaMakes = [
            ["name" => "Huawei"],
            ["name" => "CommScope"],
            ["name" => "Comba Telecom"],
            ["name" => "Kathrein"],
            ["name" => "Amphenol"],
            ["name" => "Tongyu"],
            ["name" => "Mobi"],
            ["name" => "RFS"],
            ["name" => "Shenglu"],
            ["name" => "Rosenberger"],
            ["name" => "Laird"],
            ["name" => "Kenbotong"],
            ["name" => "Alpha Wireless"]
        ];

        for($i = 0; $i < count($antennaMakes); $i++) {
            $antennaMake = new AntennaMake;
            $antennaMake->name = $antennaMakes[$i]["name"];
            $antennaMake->created_at = new DateTime();
            $antennaMake->save();
        }
    }

}

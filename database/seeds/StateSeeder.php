<?php

use App\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $states = [
            [
                "name" =>  "Abia",
                "state_code" =>  "AB"
            ],
            [
                "name" =>  "Adamawa",
                "state_code" =>  "AD"
            ],
            [
                "name" =>  "Akwa Ibom",
                "state_code" =>  "AK"
            ],
            [
                "name" =>  "Anambra",
                "state_code" =>  "AN"
            ],
            [
                "name" =>  "Bauchi",
                "state_code" =>  "BA"
            ],
            [
                "name" =>  "Bayelsa",
                "state_code" =>  "BY"
            ],
            [
                "name" =>  "Benue",
                "state_code" =>  "BN"
            ],
            [
                "name" =>  "Borno",
                "state_code" =>  "BO"
            ],
            [
                "name" =>  "Cross River",
                "state_code" =>  "CR"
            ],
            [
                "name" =>  "Delta",
                "state_code" =>  "DT"
            ],
            [
                "name" =>  "Ebonyi",
                "state_code" =>  "EB"
            ],
            [
                "name" =>  "Edo",
                "state_code" =>  "ED"
            ],
            [
                "name" =>  "Ekiti",
                "state_code" =>  "EK"
            ],
            [
                "name" =>  "Enugu",
                "state_code" =>  "EN"
            ],
            [
                "name" =>  "Gombe",
                "state_code" =>  "GM"
            ],
            [
                "name" =>  "Imo",
                "state_code" =>  "IM"
            ],
            [
                "name" =>  "Jigawa",
                "state_code" =>  "JG"
            ],
            [
                "name" =>  "Kaduna",
                "state_code" =>  "KD"
            ],
            [
                "name" =>  "Kano",
                "state_code" =>  "KN"
            ],
            [
                "name" =>  "Katsina",
                "state_code" =>  "KT"
            ],
            [
                "name" =>  "Kebbi",
                "state_code" =>  "KB"
            ],
            [
                "name" =>  "Kogi",
                "state_code" =>  "KG"
            ],
            [
                "name" =>  "Kwara",
                "state_code" =>  "KW"
            ],
            [
                "name" =>  "Lagos",
                "state_code" =>  "LA"
            ],
            [
                "name" =>  "Nasarawa",
                "state_code" =>  "NS"
            ],
            [
                "name" =>  "Niger",
                "state_code" =>  "NG"
            ],
            [
                "name" =>  "Ogun",
                "state_code" =>  "OG"
            ],
            [
                "name" =>  "Ondo",
                "state_code" =>  "OD"
            ],
            [
                "name" =>  "Osun",
                "state_code" =>  "OS"
            ],
            [
                "name" =>  "Oyo",
                "state_code" =>  "OY"
            ],
            [
                "name" =>  "Plateau",
                "state_code" =>  "PT"
            ],
            [
                "name" =>  "Rivers",
                "state_code" =>  "RV"
            ],
            [
                "name" =>  "Sokoto",
                "state_code" =>  "SK"
            ],
            [
                "name" =>  "Taraba",
                "state_code" =>  "TR"
            ],
            [
                "name" =>  "Yobe",
                "state_code" =>  "YB"
            ],
            [
                "name" =>  "Zamfara",
                "state_code" =>  "ZF"
            ],
            [
                "name" =>  "FCT",
                "state_code" =>  "FC"
            ]
        ];

        for ($i = 0; $i < count($states); $i++) {
            $state = new State;
            $state->name = $states[$i]["name"];
            $state->state_code = $states[$i]["state_code"];
            $state->created_at = new DateTime();
            $state->save();
        }
    }
}

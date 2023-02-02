<?php

use App\PowerType;
use Illuminate\Database\Seeder;

class PowerTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //v
        $powerTypes = [
            ["name" => "Main Power"],
            ["name" => "1st Back-Up"],
            ["name" => "2nd Back-Up"]
        ];
        for ($i = 0; $i < count($powerTypes); $i++) {
            $powerType = new PowerType();
            $powerType->name = $powerTypes[$i]["name"];
            $powerType->created_at = new DateTime();
            $powerType->save();
        }
    }
}

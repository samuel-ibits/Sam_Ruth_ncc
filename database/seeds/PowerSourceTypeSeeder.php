<?php

use App\PowerSourceType;
use Illuminate\Database\Seeder;

class PowerSourceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $powerSourceTypes = [
            ["name" => "Main Power", "key" => "main-power"],
            ["name" => "First Power Back-Up", "key" => "first-power-back-up"],
            ["name" => "Second Power Back-Up", "key" => "second-power-back-up"]
        ];
        for ($i = 0; $i < count($powerSourceTypes); $i++) {
            $powerSourceType = new PowerSourceType;
            $powerSourceType->name = $powerSourceTypes[$i]["name"];
            $powerSourceType->key = $powerSourceTypes[$i]["key"];
            $powerSourceType->created_at = new DateTime();
            $powerSourceType->save();
        }
    }
}

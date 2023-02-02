<?php

use App\PowerSupplierType;
use Illuminate\Database\Seeder;

class PowerSupplierTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $powerSupplierTypes = [
            ["name" => "National Grid"],
            ["name" => "Solar Renewable Energy"],
            ["name" => "Diesel Generators"],
            ["name" => "Others"]
        ];
        for ($i = 0; $i < count($powerSupplierTypes); $i++) {
            $powerSupplierType = new PowerSupplierType();
            $powerSupplierType->name = $powerSupplierTypes[$i]["name"];
            $powerSupplierType->created_at = new DateTime();
            $powerSupplierType->save();
        }
    }
}

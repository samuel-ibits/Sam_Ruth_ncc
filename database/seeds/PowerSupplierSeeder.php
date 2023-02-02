<?php

use App\PowerSupplier;
use App\PowerSupplierType;
use Illuminate\Database\Seeder;

class PowerSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $powerSuppliers = [
            ["name" => "IKEDC", "power_supplier_type_id" => 1],
            ["name" => "AEDC", "power_supplier_type_id" => 1],
            ["name" => "IEDC", "power_supplier_type_id" => 1],
            ["name" => "KEDC", "power_supplier_type_id" => 1],
            ["name" => "EKOEDC", "power_supplier_type_id" => 1],
            ["name" => "PowerGen", "power_supplier_type_id" => 2],
            ["name" => "GVE", "power_supplier_type_id" => 2],
            ["name" => "Rennewia", "power_supplier_type_id" => 2],
            ["name" => "Diesel Generator", "power_supplier_type_id" => 3],
            ["name" => "Others", "power_supplier_type_id" => 4],
            ["name" => "Apliwin", "power_supplier_type_id" => 2]
        ];
        for ($i = 0; $i < count($powerSuppliers); $i++) {
            $powerSupplier = new PowerSupplier;
            $powerSupplier->name = $powerSuppliers[$i]["name"];
            $powerSupplierType = PowerSupplierType::find($powerSuppliers[$i]["power_supplier_type_id"]);
            $powerSupplier->powersuppliertype()->associate($powerSupplierType);
            $powerSupplier->created_at = new DateTime();
            $powerSupplier->save();
        }
    }
}

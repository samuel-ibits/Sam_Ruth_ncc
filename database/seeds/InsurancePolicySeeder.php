<?php

use App\Menu;
use App\InsurancePolicy;
use Illuminate\Database\Seeder;
use Spatie\InsurancePolicy\Models\Role;

class InsurancePolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurancePolicys = [
            [
                "id"=>1,
                "name" => "Third Party"
            ], [
                "id"=>2,
                "name" => "Comprehensive"
            ]
        ];

        for ($i = 0; $i < count($insurancePolicys); $i++) {
            $insurancePolicy = new InsurancePolicy;
            $insurancePolicy->id = $insurancePolicys[$i]["id"];
            $insurancePolicy->name = $insurancePolicys[$i]["name"];
            $insurancePolicy->created_at = new DateTime();
            // print_r($insurancePolicy); 
            $insurancePolicy->save();
        }
    }
}

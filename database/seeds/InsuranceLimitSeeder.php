<?php

use App\InsuranceLimit;
use Illuminate\Database\Seeder;

class InsuranceLimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insuranceLimits = [
            [
                "id"=>1,
                "amount" => "50000000"
            ], [
                "id"=>2,
                "amount" => "70000000"
            ], [
                "id"=>3,
                "amount" => "100000000"
            ]
            , [
                "id"=>4,
                "amount" => "120000000"
            ], [
                "id"=>5,
                "amount" => "150000000"
            ], [
                "id"=>6,
                "amount" => "180000000"
            ], [
                "id"=>7,
                "amount" => "200000000"
            ]
        ];

        for ($i = 0; $i < count($insuranceLimits); $i++) {
            $insuranceLimit = new InsuranceLimit;
            $insuranceLimit->id = $insuranceLimits[$i]["id"];
            $insuranceLimit->amount = $insuranceLimits[$i]["amount"];
            $insuranceLimit->created_at = new DateTime();
            // print_r($insuranceLimit); 
            $insuranceLimit->save();
        }
    }
}

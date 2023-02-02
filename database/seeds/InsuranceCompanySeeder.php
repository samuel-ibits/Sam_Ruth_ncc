<?php

use App\InsuranceCompany;
use Illuminate\Database\Seeder;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $insuranceCompanys = [
            [
                "id"=>1,
                "name" => "Noor Takaful"
            ], [
                "id"=>2,
                "name" => "Sunu Assurance"
            ], [
                "id"=>3,
                "name" => "Anchor Insurance"
            ],  [
                "id"=>4,
                "name" => "Jaiz Takaful"
            ]
        ];

        for ($i = 0; $i < count($insuranceCompanys); $i++) {
            $insuranceCompany = new InsuranceCompany;
            $insuranceCompany->id = $insuranceCompanys[$i]["id"];
            $insuranceCompany->name = $insuranceCompanys[$i]["name"];
            $insuranceCompany->created_at = new DateTime();
            // print_r($insuranceCompany); 
            $insuranceCompany->save();
        }
    }
}

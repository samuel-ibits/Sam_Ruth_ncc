<?php

use App\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //
        $tenantsModels = [
            ["name" => "MTN"],
            ["name" => "Airtel"],
            ["name" => "GLO"],
            ["name" => "Spectranet"],
            ["name" => "Umobile"],
            ["name" => "Ntel"],
            ["name" => "Vas2Net"],
            ["name" => "9mobile"]
        ];

        for($i = 0; $i < count($tenantsModels); $i++) {
            $tenantsModel = new tenant;
            $tenantsModel->name = $tenantsModels[$i]['name'];
            $tenantsModel->created_at = new DateTime();
            $tenantsModel->save();
        }
    }
}

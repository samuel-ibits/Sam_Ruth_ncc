<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AntennaMakeSeeder::class);
        $this->call(AntennaTypeSeeder::class);
        $this->call(AntennaModelSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SubmenuSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(LGASeeder::class);
        $this->call(TowerTypesSeeder::class);
        $this->call(TowerOwnersSeeder::class);
        $this->call(TenantSeeder::class);
        $this->call(InsuranceCompanySeeder::class);
        $this->call(InsuranceLimitSeeder::class);
        $this->call(InsurancePolicySeeder::class);
        $this->call(MaintenanceScheduleSeeder::class);
        $this->call(MaintenanceAgentSeeder::class);
        $this->call(AuditTypeSeeder::class);
        $this->call(AuditAgentSeeder::class);
        $this->call(PowerSupplierTypeSeeder::class);
        $this->call(PowerSupplierSeeder::class);
        $this->call(PowerSourceTypeSeeder::class);
    }
}

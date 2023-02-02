<?php

namespace App\Repositories\Power;

use App\PowerSupplierType;

interface PowerInterface
{
    public function GetAllPowerSourceTypes();

    public function GetAllPowerSuppliers();

    public function GetPowerSuppliersByPowerSupplierType(PowerSupplierType $powersuppliertype);
    
    public function GetAllPowerSupplierTypes();

    public function GetPowerSupplierTypeById($id);

    public function GetPowerSupplierByPowerSupplierTypes(PowerSupplierType $powersuppliertype);
}

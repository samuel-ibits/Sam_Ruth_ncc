<?php
namespace App\Repositories\Power;

use App\PowerSourceType;
use App\PowerSupplier;
use App\PowerSupplierType;

class PowerRepository implements PowerInterface
{
    public function GetAllPowerSourceTypes()
    {
        return PowerSourceType::all();
    }
    public function GetAllPowerSuppliers()
    {
        return PowerSupplier::all();
    }

    public function GetPowerSuppliersByPowerSupplierType(PowerSupplierType $powersuppliertype)
    {
        return  $powersuppliertype->powersuppliers();
    }
    public function GetAllPowerSupplierTypes()
    {
        return PowerSupplierType::all();
    }

    public function GetPowerSupplierTypeById($id)
    {
        return PowerSupplierType::find($id);
    }

    public function GetPowerSupplierByPowerSupplierTypes(PowerSupplierType $powersuppliertype)
    {
        return $powersuppliertype->powersuppliers;
    }
}
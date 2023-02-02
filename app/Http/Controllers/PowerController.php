<?php

namespace App\Http\Controllers;
use App\PowerSupplierType;
use App\Repositories\Power\PowerInterface;

class PowerController extends Controller
{
    private $power;

    public function __construct(PowerInterface $power)
    {
        $this->power = $power;
    }

    public function index()
    {
        return $this->power->GetAllPowerSuppliers();
    }

    public function getpowersuppliersbypowersuppliertypeid(PowerSupplierType $powersuppliertype)
    {
        return $this->power->GetPowerSupplierByPowerSupplierTypes($powersuppliertype);
    }
};
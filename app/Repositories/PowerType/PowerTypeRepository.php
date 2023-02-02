<?php
namespace App\Repositories\PowerType;

use App\PowerType;

class PowerTypeRepository implements PowerTypeInterface
{
    public function GetAllPowertypes()
    {
        return PowerType::all();
    }

    public function GetPowerTypeById($powertypeid)
    {
        return PowerType::find($powertypeid);
    }
}

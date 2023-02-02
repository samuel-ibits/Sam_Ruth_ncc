<?php

namespace App\Repositories\Antenna;

use App\AntennaMake;
use App\AntennaModel;
use App\AntennaType;

class AntennaRepository implements AntennaInterface
{
    public function SearchAntennaMakeByName($name)
    {
        return AntennaMake::where("name", "LIKE", "$name%")->get();
    }

    public function GetAntennaMakeByName($name)
    {
        return AntennaMake::where("name", $name)->first();
    }

    public function GetAntennaMakeById($antennamakeid)
    {
        return AntennaMake::find($antennamakeid);
    }

    public function CreateAntennaMake($antennamakename)
    {
        return AntennaMake::create(["name" => $antennamakename]);
    }

    public function SearchAntennaModelByName($name)
    {
        return AntennaModel::where("name", "LIKE", "$name%")->get();
    }

    public function GetAntennaModelByName($name)
    {
        return AntennaModel::where("name", $name)->first();
    }

    public function GetAntennaModelById($antennamodelid)
    {
        return AntennaModel::find($antennamodelid);
    }

    public function CreateAntennaModel($antennamodelname)
    {
        return AntennaModel::create(["name" => $antennamodelname]);
    }

    public function GetAllAntennaTypes()
    {
        return AntennaType::all();
    }

    public function GetAntennaTypeById($antennatypeid)
    {
        return AntennaType::find($antennatypeid);
    }
}

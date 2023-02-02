<?php

namespace App\Repositories\Antenna;

interface AntennaInterface
{
    public function SearchAntennaMakeByName($name);

    public function GetAntennaMakeByName($name);

    public function GetAntennaMakeById($antennamakeid);

    public function CreateAntennaMake($antennamakename);

    public function SearchAntennaModelByName($name);

    public function GetAntennaModelByName($name);

    public function GetAntennaModelById($antennamodelid);

    public function CreateAntennaModel($antennamodelname);

    public function GetAllAntennaTypes();

    public function GetAntennaTypeById($antennatypeid);
}

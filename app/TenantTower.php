<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TenantTower extends Pivot
{
    //
    public $incrementing = true;

    public function antennamake()
    {
        # code...

        return $this->belongsTo("App\AntennaMake", "antenna_make_id");
    }

    public function antennatype()
    {
        # code...

        return $this->belongsTo("App\AntennaType", "antenna_type_id");
    }

    public function antennamodel()
    {
        # code...

        return $this->belongsTo("App\AntennaModel", "antenna_model_id");
    }

    public function tenant()
    {
        # code...
        return $this->belongsTo("App\Tenant");
    }

    public function tower()
    {
        # code...
        return $this->belongsTo("App\Tower");
    }
}

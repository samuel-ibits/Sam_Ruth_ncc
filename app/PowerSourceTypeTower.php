<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PowerSourceTypeTower extends Pivot
{
    public $incrementing = true;

    public function powersupplier()
    {
        return $this->belongsTo('App\PowerSupplier', "power_supplier_id");
    }

    public function powersourcetype()
    {
        return $this->belongsTo('App\PowerSourceType', "power_source_type_id");
    }

    public function tower()
    {
        return $this->belongsTo('App\Tower');
    }
}

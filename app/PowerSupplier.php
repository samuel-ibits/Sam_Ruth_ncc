<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerSupplier extends Model
{

    public function powersuppliertype()
    {
        return $this->belongsTo("App\PowerSupplierType","power_supplier_type_id" );
    }
}
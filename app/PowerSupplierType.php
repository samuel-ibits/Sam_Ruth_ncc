<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerSupplierType extends Model
{
    //
    
    public function powersuppliers()
    {
        # code...
        return $this->hasMany("App\PowerSupplier");
    }


}

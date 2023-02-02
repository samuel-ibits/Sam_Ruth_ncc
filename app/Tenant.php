<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name'];


    public function towers()
    {
        return $this->belongsToMany("App\Tower")->using('App\TenantTower')->withPivot([
            'antenna_make_id',
            'antenna_type_id',
            'antenna_model_id',
            'configuration',
            'active',
            'id'
        ])->withTimestamps();
    }

}

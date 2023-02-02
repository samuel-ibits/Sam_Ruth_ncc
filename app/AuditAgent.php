<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditAgent extends Model
{

    public $incrementing = true;
    //
    protected $fillable = [
        'name'];


    public function towers()
    {
        return $this->belongsToMany("App\Tower")->using('App\AuditAgentTower')->withPivot([
            'audit_date',
            'id'
        ])->withTimestamps();
    }
}

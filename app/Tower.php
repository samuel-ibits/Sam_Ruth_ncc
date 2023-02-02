<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tower extends Model
{

    protected $fillable = [
        'name', 'tower_owner_id', 'lga_id', 'tower_type_id',
        'ncc_identity', 'landlord_name', 'contact_number',
        'address', 'height', 'measurement_unit', 'erected_at',
        'longitude', 'latitude', 'no_of_sections'
    ];
    //
    use SoftDeletes;

    public function towerowner()
    {
        return $this->belongsTo("App\TowerOwner", "tower_owner_id");
    }

    public function towertype()
    {
        return $this->belongsTo("App\TowerType", "tower_type_id");
    }

    public function powersourcetypes()
    {
        return $this->belongsToMany("App\PowerSourceType")->using('App\PowerSourceTypeTower')->withPivot([
            "power_supplier_id",
            "others",
            "id"
        ])->withTimestamps();
    }

    public function lga()
    {
        # code...
        return $this->belongsTo("App\Lga");
    }

    public function insurancecompanies()
    {
        return $this->belongsToMany("App\InsuranceCompany")->using('App\InsuranceCompanyTower')->withPivot([
            'insurance_policy_id',
            'insurance_limit_id',
            'insurancepremium',
            'expires_at',
            'id'
        ])->withTimestamps();
    }

    public function tenants()
    {
        return $this->belongsToMany("App\Tenant")->using('App\TenantTower')->withPivot([
            'antenna_make_id',
            'antenna_type_id',
            'antenna_model_id',
            'configuration',
            'active',
            'id'
        ])->withTimestamps();
    }

    public function auditagents()
    {
        return $this->belongsToMany("App\AuditAgent")->using('App\AuditAgentTower')->withPivot([
            'audit_date',
            'id'
        ])->withTimestamps();
    }

    public function maintenanceengineer()
    {
        return $this->hasOne("App\MaintenanceEngineer")->where("active", true);
    }

    public function maintenanceengineers()
    {
        return $this->hasMany("App\MaintenanceEngineer");
    }
}

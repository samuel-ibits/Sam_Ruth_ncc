<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'firstname', 'lastname', 'identity', 'password', 'isAdmin','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function towerowners()
    {
        return $this->belongsToMany("App\TowerOwner")->using('App\TowerOwnerUser')->withPivot([
            'tower_id',
            'id'
        ])->withTimestamps();
    }

    public function towerdraft()
    {
        return $this->hasOne("App\TowerDraft");
    }

    public function towerownerusers()
    {
        return $this->hasMany("App\TowerOwnerUser");
    }
}

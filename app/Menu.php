<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'folder'
    ];
    //
    public function submenus()
    {
        return $this->hasMany('App\SubMenu');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submenu extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'menu', 'permission', 'url'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }
}

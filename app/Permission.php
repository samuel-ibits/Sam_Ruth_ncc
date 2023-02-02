<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as ModelsPermission;

class   Permission extends ModelsPermission{

    use SoftDeletes;
    // protected $fillable = [
    //     'name', 'description', 'submenu',
    // ];
    public function submenu()
    {
        return $this->hasOne('App\Submenu');
    }

}

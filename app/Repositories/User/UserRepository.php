<?php
namespace App\Repositories\User;

use App\Menu;
use App\Repositories\Menu\MenuInterface;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\Submenu\SubmenuInterface;
use App\Submenu;
use App\User;
use Illuminate\Http\Request;

class UserRepository implements UserInterface{


    public function CreateUser(array $post_data)
    {
        //dd($post_data);
        $submenu = new Submenu;
        $submenu->name = $post_data['name'];
        $submenu->url = $post_data['url'];
        $submenu->description = $post_data['description'];
        $menu = $this->menu->GetMenuById($post_data['menu']);
        $submenu->menu()->associate($menu);
        $submenu->save();
        return $submenu;
    }


    public function UpdateUser(User $user, array $post_data)
    {



    }

    public function GetUserById($userid)
    {
        return User::find($userid);
    }
}

<?php

namespace App\Repositories\Menu;

use App\Menu;
use App\Repositories\Permission\PermissionInterface;
use App\Submenu;
use App\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;
use Spatie\Permission\Models\Role;

class MenuRepository implements MenuInterface
{

    private PermissionInterface $permission;

    public function __construct(PermissionInterface $permission)
    {
        $this->permission = $permission;
    }

    public function GetAllMenu()
    {

        return Menu::all();
    }

    public function GetMenuById($menuid)
    {

        return Menu::find($menuid);
    }

    function AddMenu(array $post_data)
    {

        return  Menu::create($post_data);
    }

    public function UpdateMenu(Menu $menu, array $post_data)
    {

        return $menu->update($post_data);
    }

    public function GetMenusByUser()
    {
        # code...
        $user = Auth::user();
        $permissions = array();

        $submenus = array();
        $menus = array();
        if ($user) {

            $roles = $user->roles;

            foreach ($roles as $role) {
                // array_push($permissions, );
                // foreach($role->permissions as $permission){
                //     // $permission = $this->permission->GetPermissionById( $permission->id);
                //     array_push($permissions, $permission->pluck('id'));
                //     // array_push($permissions, Submenu::with('menu')->where("id","=", $permission->submenu->id)->get()->toArray());
                // }
                $permissions = $role->permissions;
            }
            //dd($permissions);
            //$permissions =  $this->permission->GetPermissionById( $permissions);
            //dd($permissions);
            foreach ($permissions as $permission) {
                $permission = $this->permission->GetPermissionById($permission->id);
                if ($permission)
                    if ($permission->submenu)
                        if ($permission->submenu->menu && $permission->submenu->is_visible)
                            array_push($submenus, $permission->submenu);
            }
            //dd($submenus);
            $menus = collect($submenus)->groupBy(function ($item, $key) {
                //dd($item['menu']);
                return $item['menu']['name'];
            })->toArray();
        }
        //dd($menus);
        return $menus;
    }

    public function GetEntryMenusByUser()
    {
        # code...
        $user = Auth::user();
        $permissions = array();
        $menus = array();
        if ($user) {

            $roles = $user->roles;

            foreach ($roles as $role) {
                // array_push($permissions, );
                // foreach($role->permissions as $permission){
                //     // $permission = $this->permission->GetPermissionById( $permission->id);
                //     array_push($permissions, $permission->pluck('id'));
                //     // array_push($permissions, Submenu::with('menu')->where("id","=", $permission->submenu->id)->get()->toArray());
                // }
                $permissions = $role->permissions;
            }
            //dd($permissions);
            //$permissions =  $this->permission->GetPermissionById( $permissions);
            //dd($permissions);
            foreach ($permissions as $permission) {
                $permission = $this->permission->GetPermissionById($permission->id);
                if ($permission && $permission->submenu && $permission->submenu->menu && $permission->submenu->is_entry) {
                    $submenus = $permission->submenu;
                    return $submenus->menu->folder . "/" . $submenus->url;
                }
                //dd($permission);
            }
        }
        //dd($menus);
        return "";
    }

    public function DeleteMenu(Menu $menu)
    {
        # code...
        foreach ($menu->submenus as $submenu)
            $submenu->menu()->dissociate()->save();
        return $menu->delete();
    }
}

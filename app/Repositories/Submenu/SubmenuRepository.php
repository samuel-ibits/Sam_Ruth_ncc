<?php

namespace App\Repositories\Submenu;

use App\Menu;
use App\Permission;
use App\Repositories\Menu\MenuInterface;
use App\Repositories\Permission\PermissionInterface;
use App\Submenu;
use Illuminate\Http\Request;

class SubmenuRepository implements SubmenuInterface
{
    private $permission;
    private $menu;

    public function __construct(PermissionInterface $permission, MenuInterface $menu)
    {
        $this->permission = $permission;
        $this->menu = $menu;
    }

    public function AddSubmenu(array $post_data)
    {
        //dd($post_data);
        $submenu = new Submenu;
        $submenu->name = $post_data['name'];
        $submenu->url = $post_data['url'];
        $submenu->description = $post_data['description'];
        $submenu = array_key_exists('permission', $post_data) ? $this->AddSubmenuWithPermission($submenu, $post_data) : $submenu;
        $menu = $this->menu->GetMenuById($post_data['menu']);
        if (isset($post_data['is_visible'])) {
            $submenu->is_visible = 1;
        } else {
            $submenu->is_visible = 0;
        }
        if (isset($post_data['is_entry'])) {
            $submenu->is_entry = 1;
        } else {
            $submenu->is_entry = 0;
        }
        $submenu->menu()->associate($menu);
        $submenu->save();
        return $submenu;
    }

    private function AddSubmenuWithPermission($submenu, array $post_data)
    {
        # code...
        $permissions = $this->permission->GetPermissionById($post_data['permission']);
        $submenu->Permission()->associate($permissions);
        $menu = $this->menu->GetMenuById($post_data['menu']);
        $submenu->menu()->associate($menu);
        return $submenu;
    }

    public function UpdateSubmenu(Submenu $submenu, array $post_data)
    {

        $submenu->name = $post_data['name'];
        $submenu->description = $post_data['description'];
        $submenu->url = $post_data['url'] ? $post_data['url'] : "";
        if (isset($post_data['is_visible'])) {
            $submenu->is_visible = 1;
        } else {
            $submenu->is_visible = 0;
        }
        if (isset($post_data['is_entry'])) {
            $submenu->is_entry = 1;
        } else {
            $submenu->is_entry = 0;
        }
        $submenu =  array_key_exists('permission', $post_data) ? $this->UpdateSubmenuWithPermission($submenu, $post_data) : $submenu;
        $menu = $this->menu->GetMenuById($post_data['menu']);
        $submenu->menu()->associate($menu);
        $submenu->save();
        return $submenu;
    }

    private function UpdateSubmenuWithPermission($submenu, array $post_data)
    {
        # code...
        $permission = $this->permission->GetPermissionById($post_data['permission']);
        $submenu->permission()->dissociate()->save();
        $submenu->permission()->associate($permission);

        return $submenu;
    }

    public function DeleteSubmenu(Submenu $submenu)
    {
        # code...
        $submenu->menu()->dissociate()->save();
        $submenu->permission()->dissociate()->save();
        return $submenu->delete();
    }
}

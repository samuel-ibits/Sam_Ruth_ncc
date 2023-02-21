<?php

namespace App\Repositories\Menu;

use App\Menu;

interface MenuInterface
{

    public function GetAllMenu();

    public function GetMenuById($menuid);

    public function AddMenu(array $post_data);

    public function UpdateMenu(Menu $menu, array $post_data);

    public function GetMenusByUser();

    public function DeleteMenu(Menu $menu);

    public function GetEntryMenusByUser();
}

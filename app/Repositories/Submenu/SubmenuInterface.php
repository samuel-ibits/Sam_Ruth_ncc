<?php

namespace App\Repositories\Submenu;

use App\Menu;
use App\Permission;
use App\Submenu;

interface SubmenuInterface
{

    public function AddSubmenu(array $post_data);

    public function UpdateSubmenu(Submenu $submenu, array $post_data);

    public function DeleteSubmenu(Submenu $submenu);
}

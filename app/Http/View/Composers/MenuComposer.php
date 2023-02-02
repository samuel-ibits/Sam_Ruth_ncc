<?php
namespace App\Http\View\Composers;

use App\Repositories\Menu\MenuRepository;
use Illuminate\View\View;

class MenuComposer{
    protected $menus;

    public function __construct(MenuRepository $menus)
    {
        // Dependencies automatically resolved by service container...
        $this->menus = $menus;
    }

    public function compose(View $view)
    {
        $view->with('portalmenus', $this->menus->GetMenusByUser());
    }
}

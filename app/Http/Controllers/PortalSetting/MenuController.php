<?php

namespace App\Http\Controllers\PortalSetting;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Menu\MenuInterface;
use Illuminate\Support\Facades\URL;

class MenuController extends Controller
{

    private $menu;

    function __construct(MenuInterface $menu)
    {
        $this->menu = $menu;
        // $routeName = request()->getRequestUri();
        // dd($routeName);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $menus = Menu::latest('id','DESC')->paginate(5);
        // dd($request->input('page', 1) - 1) * 5;
        return view('portalsettings.menus.index',compact('menus'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a Menu
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('portalsettings.menus.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menus,name',
            'folder' => 'required|unique:menus,folder',
            'description' => 'required',
        ]);

        $menu = $this->menu->AddMenu($request->all());
        //dd($menu);
        if($menu->id)
        return redirect()->route('menus.index')
                        ->with('success','Menu created successfully');
        else{
            return view('portalsettings.menus.create')->with('error','error occurred');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
        return view('portalsettings.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
        return view('portalsettings.menus.edit', compact('menu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $request->validate([
            'name' => 'required',
            'folder' => 'required',
            'description' => 'required',
        ]);
        $this->menu->UpdateMenu($menu, $request->all());
        return redirect()->route('menus.index')
                        ->with('success','Menu created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        $this->menu->DeleteMenu($menu);
        return redirect()->route('menus.index')
                        ->with('success','Menu deleted successfully');

    }
}

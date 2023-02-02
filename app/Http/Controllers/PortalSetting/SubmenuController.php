<?php

namespace App\Http\Controllers\PortalSetting;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Submenu;
use Illuminate\Http\Request;
use App\Permission;
use App\Repositories\Menu\MenuInterface;
use App\Repositories\Submenu\SubmenuInterface;
use App\Repositories\Permission\PermissionInterface;
use Illuminate\Support\Facades\Route;

class SubmenuController extends Controller
{
    private $submenu;
    private $menu;
    private $permission;

    function __construct(SubmenuInterface $submenu, MenuInterface $menu, PermissionInterface $permission)
    {
        //dd( $submenu);
        // if (request()->url === ""){
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        // }
        $this->submenu = $submenu;
        $this->menu = $menu;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         //
         $submenus = Submenu::latest('id','DESC')->paginate(5);
         // dd($menus);
             return view('portalsettings.submenus.index',compact('submenus'))
                 ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menus = $this->menu->GetAllMenu();
        $permissions  = $this->permission->GetAllUnusedPermission();
        //dd($permissions);
        return view('portalsettings.submenus.create', compact('menus', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request->input('menu'));
        if($request->has('pemission')){
            $request->validate([
                'name' => 'required|unique:submenus,name',
                'description' => 'required',
                'menu'=>'required',
                'url'=>'required',
                'permission'=> 'required|unique:submenus,permission_id'
            ]);
        } else{
            $request->validate([
                'name' => 'required|unique:submenus,name',
                'description' => 'required',
                'url'=>'required',
                'menu'=>'required'
            ]);
        }

        $this->submenu->AddSubmenu($request->all());

        return redirect()->route('submenus.index')
                        ->with('success','Menu created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function show(submenu $submenu)
    {
        //
        return view('portalsettings.submenus.show', compact('submenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */

    public function edit(Submenu $submenu)
    {
        //
        $menus = $this->menu->GetAllMenu();
        if( $submenu->permission)
            $permission = $submenu->permission->toArray();
        else
        $permission = Array();
        //dd($permission);

        $permissions  = $this->permission->GetAllUnusedPermission()->toArray();

        // dd($permissions);
        if( count($permissions) > 0) {
            array_push($permissions, $permission);
        }

        //dd($submenu->permission->id);
        return view('portalsettings.submenus.edit', compact('submenu', 'menus', 'permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Submenu $submenu)
    {
        if($request->has('permission')){
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'menu'=>'required',
                'permission'=> 'required'
            ]);
        } else{
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'menu'=>'required'
            ]);
        }
        $this->submenu->UpdateSubmenu($submenu, $request->all());
        return redirect()->route('submenus.index')
        ->with('success','Submenu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenu $submenu)
    {
        //
        $this->submenu->DeleteSubmenu($submenu);
        return redirect()->route('submenus.index')
        ->with('success','Submenu deleted successfully');
    }
}

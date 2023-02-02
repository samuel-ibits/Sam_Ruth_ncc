<?php

namespace App\Http\Controllers\PortalSetting;

use App\Permission;
use App\Submenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Permission\PermissionInterface;

class PermissionController extends Controller
{

    private $permission;

    function __construct(PermissionInterface $permission)
    {
        $this->permission = $permission;
        // $routeName = request()->getRequestUri();
        // dd($routeName);
    }

    public function index(Request $request)
    {
        //
        $permissions = Permission::orderBy('id', 'DESC')->paginate(5);
        return view('portalsettings.permissions.index', compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1)* 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $submenus = Submenu::whereNull('permission_id')->get();
        return view('portalsettings.permissions.create', compact('submenus'));
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
        if($request->has('submenu')) {
           // dd($request);
            $request->validate([
                'name' => 'required|unique:permissions,name',
                'submenu' => 'required',
                'description' => 'required'
            ]);
        }
        else {
            $request->validate([
                'name' => 'required|unique:permissions,name',
                'description' => 'required',
            ]);
        }
        if($request->has('submenu')){

            $permission = new Permission;
            $permission->name = $request->input('name');
            $permission->description = $request->input('description');
            $submenu = Submenu::find( $request->input('submenu'));

            //dd($permission->submenu;
            $permission->save();
            $submenu->permission()->associate($permission)->save();
        }
        else{
            Permission::create($request->all());
        }

        return redirect()->route('permissions.index')
                        ->with('success','Permission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        $permission= $permission->load("submenu");
        // dd($permission);
        return view('portalsettings.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //

        if($permission->submenu)
        $submenu =  $permission->submenu->toArray();
        else
        $submenu = Array();
        //dd($submenu);
        $submenus = Submenu::whereNull('permission_id')->get()->toArray();
        //dd($submenus);
        if(count($submenu)> 0) {
            array_push($submenus, $submenu);
        }
        //dd($submenus);
        return view('portalsettings.permissions.edit', compact('permission', 'submenus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
        $permission->name = $request->input('name');
        $permission->description = $request->input('description');
         //
        if($request->has('submenu')){
           // dd($request);
            $request->validate([
                'name' => 'required',
                'submenu' => 'required',
                'description' => 'required'
            ]);
            //dd($request);
            $submenu = Submenu::find($request->input('submenu'));
            //dd($submenu);
            if($permission->submenu)
            $permission->submenu->permission()->dissociate()->save();
            $submenu->permission()->associate($permission)->save();
        } else {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            $permission->save();
            $permission->submenu->permission()->dissociate()->save();
        }
        return redirect()->route('permissions.index')->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
        $this->permission->DeletePermission($permission);

        return redirect()->route('permissions.index')
        ->with('success', 'Permission deleted successfully');

    }
}

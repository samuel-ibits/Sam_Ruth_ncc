<?php

namespace App\Http\Controllers\PortalSetting;

use App\Http\Controllers\Controller;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\Role\RoleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $role;
    private $permission;

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(RoleInterface $role, PermissionInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
        // if (request()->url === ""){
            // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
            // $this->middleware('permission:role-create', ['only' => ['create','store']]);
            // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
            // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        // }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('portalsettings.roles.index', compact('roles'))
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
        $permission = $this->permission->GetAllPermission();
        return view('portalsettings.roles.create', compact('permission'));
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

        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'description' => 'required'
        ]);

        $role = $this->role->CreateRole($request->all());

        return redirect()->route('roles.index')
                        ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        // $rolePermissions = Permission::join("role_has_permssions", "role_has_permissions.permission_id", "=","permissions.id")
        //     ->where("role_has_permissions.role_id", $role->id)
        //     ->get();
        $getpermission = $this->permission;
        return view('portalsettings.roles.show', compact('role', 'getpermission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
            // foreach($permission as $permision){

            //     dd($rolePermissions, $permision->id, in_array($permision->id, $rolePermissions));
            // }
            return view('portalsettings.roles.edit', compact('role', 'permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        //

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
            'description' => 'required'
        ]);

        $role->name = $request->input('name');
        $role->description = $request->input('description');

        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table("roles")->where('id', $id)->delete();

        return redirect()->route('roles.index')
                        ->with('success','Role delted successfully');
    }
}

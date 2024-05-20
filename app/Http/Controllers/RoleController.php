<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Tables\Roles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use Gate;




class RoleController extends Controller
{    
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Role_access|Role_create|Role_edit|Role_delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Role_create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Role_edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Role_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role= Role::latest()->get();

        // return view('dashboard.role.index',['roles'=>$role]);
        // $role=Role::class;
        // dd($role);
        return view('dashboard.role.index', [
            'roles' => Roles::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permissions=Permission::pluck('name', 'id')->toArray();
        // dd($permissions);
        // $permissions = Permission::get();
        // return view('dashboard.role.new',['permissions'=>$permissions]);
        return view('dashboard.role.create', [
            'permissions' => Permission::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        // $request->validate(['name'=>'required']);

        // $role = Role::create(['name'=>$request->name]);

        // $role->syncPermissions($request->permissions);
        
        // return redirect()->back()->withSuccess('Role created !!!');
        // dd($request->all());
      
        $permissionIDs = $request->permissions;
        // dd($permissionIDs);
        $permissions = [];
        if( $permissionIDs){
        foreach ($permissionIDs as $permissionID) {
            $permissions[] = Permission::find($permissionID)->name;
        }
      }

        $role = Role::create($request->validated());
        if( $permissions){
            $role->syncPermissions($request->$permissions);
        }
       
        Splade::toast('Role created')->autoDismiss(3);

        return to_route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
    //     $permission = Permission::get();
    //     $role->permissions;
    //    return view('setting.role.edit',['role'=>$role,'permissions' => $permission]);
        return view('dashboard.role.edit', [
        'role' => $role,
        'permissions' => Permission::pluck('name', 'id')->toArray()
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // $role->update(['name'=>$request->name]);
        // $role->syncPermissions($request->permissions);
        // return redirect()->back()->withSuccess('Role updated !!!');
        $permissionIDs = $request->permissions;
        $permissions = [];
        if($permissionIDs){
        foreach ($permissionIDs as $permissionID) {
            $permissions[] = Permission::find($permissionID)->name;
        }
    }
        
        $role->update($request->validated());
        if($permissions){
        $role->syncPermissions($permissions);
        }
        Splade::toast('Role updated')->autoDismiss(3);

        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // $role->delete();
        // return redirect()->back()->withSuccess('Role deleted !!!');
        $role->delete();
        Splade::toast('Role deleted')->autoDismiss(3);

        return back();
    }
}

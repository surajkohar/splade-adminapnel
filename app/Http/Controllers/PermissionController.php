<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Tables\Permissions;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('role_or_permission:Permission_access|Permission_create|Permission_edit|Permission_delete', ['only' => ['index','show']]);
        // $this->middleware('role_or_permission:Permission_create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Permission_edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Permission_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $permission= Permission::latest()->get();

        // return view('setting.permission.index',['permissions'=>$permission]);
        return view('dashboard.permissions.index', [
            'permissions' => Permissions::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.permissions.create', [
            'roles' => Role::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {
        // validation 
        // $request->validate([
        //     'name'=>'required',
        // ]);
        // $permission = Permission::create(['name'=>$request->name]);
        // return redirect()->back()->withSuccess('Permission created !!!');
        $roleIDs = $request->roles;
        $roles = [];
        
        foreach ($roleIDs as $roleID) {
            $roles[] = Role::find($roleID)->name;
        }

        $permission = Permission::create($request->validated());
        $permission->syncRoles($roles);
        Splade::toast('Permission created')->autoDismiss(3);

        return to_route('permissions.index');
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
    public function edit(Permission $permission)
    {
    //    return view('dashboard.permissions.edit',['permission' => $permission]);
       return view('dashboard.permissions.edit', [
        'permission' => $permission,
        'roles' => Role::pluck('name', 'id')->toArray()
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        // $permission->update(['name'=>$request->name]);
        // return redirect()->back()->withSuccess('Permission updated !!!');
        $roleIDs = $request->roles;
        $roles = [];
        if( $roleIDs){
        foreach ($roleIDs as $roleID) {
            $roles[] = Role::find($roleID)->name;
        }
    }


        $permission->update($request->validated());
        if($roles){
        $permission->syncRoles($roles);
        }
        Splade::toast('Permission updated')->autoDismiss(3);

        return to_route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // $permission->delete();
        // return redirect()->back()->withSuccess('Permission deleted !!!');
        $permission->delete();
        Splade::toast('Permission deleted')->autoDismiss(3);

        return back();
    }
}

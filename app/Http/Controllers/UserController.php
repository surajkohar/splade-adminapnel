<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use ProtoneMedia\Splade\SpladeTable; 
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
// use ProtoneMedia\Splade\SpladeForm;
// use ProtoneMedia\Splade\FormBuilder\Input;
// use ProtoneMedia\Splade\FormBuilder\Submit;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('role_or_permission:user_access|add_user|edit_user|delete_user', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:add_user', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:edit_user', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:delete_user', ['only' => ['destroy']]);
    }


    public function index()
    {
        // return view('admin.users.index', [
        //     'users' => Users::class
        // ]);
        return view('dashboard.users.index',[
            'users'=>SpladeTable::for(User::class)
            ->column('name',sortable:true)
            ->withGlobalSearch(columns: ['name', 'email'])
            ->column('email',sortable:true)
             ->column('role',sortable:true)
             ->column('action')
             ->column('created_at', sortable: true, hidden: true)
             ->paginate(15)]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'permissions' => Permission::pluck('name', 'id')->toArray(),
            'roles' => Role::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);
        Splade::toast('User created')->autoDismiss(3);

        return to_route('admin.users.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'permissions' => Permission::pluck('name', 'id')->toArray(),
            'roles' => Role::pluck('name', 'id')->toArray(),
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request);
        $roleIDs = $request->roles;
        $roles = [];
        if( $roleIDs){
        foreach ( $roleIDs as $roleID) {
            $roles[] = Role::find($roleID)->name;
        }
      }
        $user->update($request->validated());
        if( $roles){
        $user->syncRoles($roles);
        }
        // $user->syncPermissions($request->permissions);
        Splade::toast('User updated')->autoDismiss(3);

        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
    
        $user->delete();
        Splade::toast('User deleted')->autoDismiss(3);
        return back();
    }
}

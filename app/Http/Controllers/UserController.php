<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Departments;
use Ultraware\Roles\Models\Role;
use Ultraware\Roles\Models\Permission;
use URL;
use Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::paginate(10);
        $depts = Departments::all();
        $roles = Role::all();
        $error_resp = '0';

        if( !is_null($request->input('status')) )
        {
            $users = User::where('status', $request->status)->paginate(10);

            if(count($users) == 0 ){
                $error_resp = '1';
            }
        }

        if( !is_null($request->input('department')) )
        {
            
            $users = User::whereHas('department', 
                function ($query) use ($request) {
                    $query->where('id', $request->department);
                })->paginate(10);

            if(count($users) == 0 ){
                $error_resp = '1';
            }

        }

        if( !is_null($request->input('role')) )
        {
            
            $users = User::whereHas('roles', 
                function ($query) use ($request) {
                    $query->where('role_id', $request->role);
                })->paginate(10);

            if(count($users) == 0 ){
                $error_resp = '1';
            }
        }

        return view('Users.index',compact('users','depts','roles','error_resp'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $departments = Departments::all();
        return view('Users.user',compact('user','roles','departments'));
    }


    public function update(Request $request, $id)
    {
        $role = $request['role'];
        $password = Hash::make($request->password);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department_id,
            'password' => $password
        ]);
        
        $user = User::where('email',$request->email)->first();
        
        if ($role){
            if(count($user->roles) > 1)
            {
                $user->detachAllRoles();
            }else{
                $user->detachRole($user->roles);
            }
            
            $user->syncRoles($role);
        }

        $request->session()->flash('status', 'User details updated');

        return redirect()->back();
    }

    public function updatepass(Request $request)
    {
        $password = Hash::make($request->password);

        $user = User::where('id', $request->id)->update(['password' => $password]);

         if($user){

            $request->session()->flash('status', 'password updated successfully');
            return redirect()->back();
         }
    }

    public function activate(Request $request)
    {
        if($request->ajax())
        {
            $user = User::where('id', $request->id)->update([
                'status' => $request->status
            ]);

            if($user){
                $data = "role successfully activated";
                return response()->json($data);
            }
        }
    }

    public function deactivate(Request $request)
    {
        if($request->ajax())
        {
            $user = User::where('id', $request->id)->update([
                'status' => $request->status
            ]);

            if($user){
                $data = "role successfully deactivated";
                return response()->json($data);
            }
        }
    }

    public function destroyUser(Request $request)
    {
        $deleteduser = User::find($request->user_id);

        $deleteduser->delete();

        if ($deleteduser->trashed()) {
            session()->flash('status','User deleted !');
            return back();
        }
    }

    public function allRoles()
    {
        $roles = Role::all();
        return view('Users.roles',compact('roles'));
    }

    public function createrole()
    {
        $priviledges = Permission::all();
        return view('Users.createrole',compact('priviledges'));
    }

    public function showrole($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions->pluck('id')->toArray();
        $priviledges = Permission::all();
        
        return view('Users.role',compact('priviledges','role','permissions'));
    }


    public function storerole(Request $request)
    {
        $slug_req = explode(" ",$request->name);

        if(count($slug_req) > 1){
            $slug  = strtolower(implode(".",$slug_req));
        }else{
            $slug  = strtolower($request->name);
        }
        
        $role = Role::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);

            if($role){
                $role->syncPermissions($request->permissions);
                session()->flash('status', 'role created');
                return back();
            }
    }

    public function updaterole(Request $request)
    {
        $permissions = $request->permissions;

        $role = Role::where('id',$request->role_id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $role = Role::where('id',$request->role_id)->first();
        
        if ($permissions){
            if(count($role->permissions) > 1)
            {
                $role->detachAllPermissions();
            }else{
                $role->detachPermission($role->permissions);
            }
            
            $role->syncPermissions($permissions);
        }
        session()->flash('status', 'role updated');
        return back();
    }

    public function destroyRole(Request $request)
    {
        $deletedrole = Role::destroy($request->role_id);

        if ($deletedrole) {
            session()->flash('status','Role deleted !');
            return back();
        }
    }
}

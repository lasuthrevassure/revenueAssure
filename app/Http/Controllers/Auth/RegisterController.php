<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Ultraware\Roles\Models\Role;
use Ultraware\Roles\Models\Permission;
use URL;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('Users.index',compact('users'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:14',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $length = 8;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );

        $roles =  $data['role'];

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($password),
        ]);


        $user->syncRoles($roles);

        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'password' => $password,
            'url' => URL::route('home')
        ];
         
        Mail::to($user->email)->send(new \App\Mail\UserRegistration($data));

        session()->flash('status','User created successfully');

        return redirect('users');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('Users.user',compact('user','roles'));
    }


    public function update(Request $request, $id)
    {
        $role = $request['role'];
        $password = Hash::make($request->password);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
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


    public function createrole()
    {
        $priviledges = Permission::all();
        return view('Users.createrole',compact('priviledges'));
    }


    public function storerole(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

            if($role){
                $role->syncPermissions($request->permissions);
                session()->flash('status', 'role created');
                return back();
            }
    }
}

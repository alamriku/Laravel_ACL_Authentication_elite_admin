<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Hash;
use App\User;
use App\Role;
class AdminAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function postSingUp(Request $request){

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|string|unique:users,email',
            'password' =>'confirmed',
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        $user->save();
        $user->roles()->attach(Role::where('name','User')->first());
        Auth::login($user);
        return redirect()->route('user');
    }

    public function postAssignRole(Request $request){
        $user =  User::where('email',$request->email)->first();
        $user->roles()->detach();
        if($request->role_user){
        $user->roles()->attach(Role::where('name','User')->first());
        } if($request->role_admin){
        $user->roles()->attach(Role::where('name','Admin')->first());
        } if($request->role_author){
        $user->roles()->attach(Role::where('name','Author')->first());
        }if($request->role_visitor){
        $user->roles()->attach(Role::where('name','Visitor')->first());
        }
        return redirect()->back();
    }
}

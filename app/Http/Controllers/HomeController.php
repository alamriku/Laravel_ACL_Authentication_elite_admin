<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users= User::all();
        return view('admin.dashboard',['users'=>$users]);
    }

    public function acl(){
        $users= User::all();
        return view('admin.dashboard',['users'=>$users]);
    }

    public function getAuthorPage(){
        dd('getAuthorPage');
    }
    public function getAdminPage(){
        dd('getAdminPage');
    }
    public function getVisitorPage(){
        dd('getVisitorPage');
    }
    public function getUserPage(){
        dd('getUserPage');
    }



}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user=Role::where('name','Admin')->first();
        $role_author=Role::where('name','Author')->first();
        $role_visitor=Role::where('name','Visitor')->first();
        $user = new User();
        $user->name ='Admin';
        $user->email='admin'.'@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->roles()->attach($role_user);

        $Visitor = new User();
        $Visitor->name ='Visitor';
        $Visitor->email='Visitor'.'@gmail.com';
        $Visitor->password = Hash::make('password');
        $Visitor->save();
        $Visitor->roles()->attach($role_visitor);

        $author = new User();
        $author->name ='Author';
        $author->email='Author'.'@gmail.com';
        $author->password = Hash::make('password');
        $author->save();
        $author->roles()->attach($role_author);

    }
}

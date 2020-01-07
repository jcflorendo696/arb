<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Roles;
use DB;
use Hash;

class UsersController extends Controller
{
    public function index(){

        $users = User::all();
        $roles = Roles::all();

        $data = ([
            'users' => $users,
            'roles' => $roles
        ]);

        return view('users-mgt', $data);
    }

    public function addUser(Request $request){
        //dd( $request );
        $validateUser = $request->validate([
            'name'      =>  ['required'],
            'email'     =>  ['required','unique:users'],
            'password'  =>  ['required','confirmed'],
            'role'      =>  ['required'],
        ]);


        DB::table('users')->insert([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => $request->role,
        ]);

        return redirect('/user-management');
    }

    public function deleteUser(Request $request){
        DB::table('users')->where('id','=', $request->btnDelete)->delete();
        return redirect('/user-management');
    }

}

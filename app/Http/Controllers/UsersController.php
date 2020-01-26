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
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        return redirect('/user-management');
    }

    public function deleteUser(Request $request){
        DB::table('users')->where('id','=', $request->btnDelete)->delete();
        return redirect('/user-management');
    }

    public function updateUser(Request $request){
        
        // response to call
        $response = ([
            'status' => 'success',
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role'),
            'role_name' => $request->input('role_name'),
            ]);
        
        //  array of updated data
        $updatedUser = ([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'role_id'   => $request->input('role')
        ]);
        
        //  push to db
        $affected = DB::table('users')
                        ->where('id', $request->input('id') )
                        ->update( $updatedUser );

        return response()->json( $response );
    }

}

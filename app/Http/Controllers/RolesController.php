<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use DB;

class RolesController extends Controller
{
    public function index(){
        $roles = Roles::all();

        $data = ([
           'roles' => $roles 
        ]);

        return view('roles', $data);
    }

    public function addRole(Request $request){

        $validate = $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        DB::table('roles')->insert([
            'role'=> $request->name,
            'description'=> $request->description
        ]);

        return redirect('roles');
    }

    public function deleteRole(Request $request){
        //dd($request->btnDelete);
        DB::table('roles')->where( 'id','=', $request->btnDelete )->delete();

        return redirect('roles');
    }

    public function updateRole(Request $request){
        

        $response = array(
            'status' => 'success',
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
        );

        $updateUser = array(
            'role'          => $request->input('name'),
            'description'   => $request->input('desc'),
        );

        $affected = DB::table('roles')
                        ->where('id', $request->input('id'))
                        ->update( $updateUser );

        return response()->json($response);
    }
}

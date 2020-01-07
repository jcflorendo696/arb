<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Hash;
use Auth;

class SettingsController extends Controller
{
    public function index(){
        return view('/settings');
    }

    public function updatePassword(Request $request){
        //dd( $request->new_password );

        $validate = $request->validate([
            'new_password' => ['required']
        ]);

        $user = ([
            'password' => Hash::make($request->new_password)
        ]);

        $affected = DB::table('users')
                    ->where('id', Auth::user()->id )
                    ->update($user);

        return Redirect::back()->with('msg','Password Updated!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;

class SocialiteLoginController extends Controller
{
    //
    public function index(){
        return view('socialite');
    }




    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }



    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(){
        $user = Socialite::driver('facebook')->user();

        //$user->token
    }



    /**--------------------------------------------------------------
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGoogle(){
        return Socialite::driver('google')->redirect();
    }



    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle(){
        $user = Socialite::driver('google')->user();


        return view('socialite', [ 'data' => $user ]);

        //$user->token
    }

}

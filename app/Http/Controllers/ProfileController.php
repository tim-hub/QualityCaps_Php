<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
        /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  null
     * @return Response
     */
    public function show_me()
    {
        // return view('userProfile', ['user' => User::findOrFail($id)]);

        /*
        *
        This uses the Auth facade. A list of all available facades is in config/app.php under aliases:

        What if I need Auth in my controller? Injecting an instance of Guard like shown
         in the question works, but you don't need to.
         You can use the Auth facade like we did in the template:
        *
        */
        $user = \Auth::user();

        return view('users.userProfile', compact('user'));
    }

    /**
     * Display admin page.
     * @return Response
     */
    public function admin()
    {
        $user = \Auth::user();

        if ($user -> role >8){
            return view('users.adminIndex');
        }
        else{
            return view('users.userProfile', compact('user'));
        }

        // return view('users.adminIndex');
    }
}


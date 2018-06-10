<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

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
     * @param  int  $id
     * @return Response
     */
    public function showProfile(User $user)
    {
        // return view('userProfile', ['user' => User::findOrFail($id)]);
        return view('userProfile', compact('user'));
    }

    /**
     * Display admin page.
     * @return Response
     */
    public function admin()
    {
        return view('home.contact');
    }
}


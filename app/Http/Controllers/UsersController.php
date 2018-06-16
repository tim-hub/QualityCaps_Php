<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }

	public function index()
	{
		$users = User::paginate();
		return view('users.index', compact('users'));
	}

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

	public function create(User $user)
	{
		return view('users.create_and_edit', compact('user'));
	}

	public function store(UserRequest $request)
	{
		$user = User::create($request->all());
		return redirect()->route('users.show', $user->id)->with('message', 'Created successfully.');
	}

	public function edit(User $user)
	{
        $this->authorize('update', $user);
		return view('users.create_and_edit', compact('user'));
	}

	public function update(UserRequest $request, User $user)
	{
		$this->authorize('update', $user);
		$user->update($request->all());

		return redirect()->route('users.show', $user->id)->with('message', 'Updated successfully.');
	}

	public function destroy(User $user)
	{
		$this->authorize('destroy', $user);
		$user->delete();

		return redirect()->route('users.index')->with('message', 'Deleted successfully.');
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
            return response("Unautherized", 401);
        }

        // return view('users.adminIndex');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  Request
     * @return Response
     */
    public function toggle(Request $request){


        $id = $request->get('id');

        $user = \Auth::user();

        if ($user -> role >8){


            $customer = User::findOrFail($id);
            $status = $customer -> enabled ;

            if ($status ===1){
                $customer -> enabled =0;
            }else{
                $customer-> enabled =1;
            }

            $customer ->save();


            return redirect() -> route('users.index');


        }else{
            return response("Unautherized", 401);
        }

    }
}

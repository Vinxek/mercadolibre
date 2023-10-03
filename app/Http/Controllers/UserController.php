<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{

    public function index(Request $request)
    {
		$users = User::get();
        if(!$request->ajax()) return view('user.index', compact('users'));
		return response()->json(['users' => $users	], 200);
    }


    public function create()
    {
        //
    }


    public function store(UserRequest $request)
    {
        $user =  new User($request->all());
		$user->save();
		if(!$request->ajax()) return back()->with('success', 'User Created');
		return response()->json(['Status' => 'User Created', 'users' => $user], 201);
    }


    public function show(Request $request, User $user)
    {
        if(!$request->ajax()) return view('user.index', compact('users'));
		return response()->json(['users' => $user	], 200);
    }


    public function edit()
    {

    }


    public function update(UserRequest $request, User $user)
    {
		$user->update($request->all());
		if(!$request->ajax()) return back()->with('success', 'User updated');
		return response()->json([], 204);
    }


    public function destroy(Request $request, User $user)
    {
        $user->delete();
		if(!$request->ajax()) return back()->with('success', 'User deleted');
		return response()->json([], 204);
    }
}

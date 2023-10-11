<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{

    public function index(Request $request)
    {
		$users = User::with('file')->get();
        if(!$request->ajax()) return view('users.index', compact('users'));
		return response()->json(['users' => $users	], 200);
    }


    public function create()
    {
		$roles = Role::all()->pluck('name');
        return view('users.create', compact('roles'));
	}

	use UploadFile;
    public function store(UserRequest $request)
    {

		try {
			DB::beginTransaction();
			$user =  new User($request->all());
			$user->save();
			$user->assignRole($request->role);
			$this->uploadFile($user, $request);
			DB::commit();
			if(!$request->ajax()) return back()->with('success', 'User Created');
			return response()->json(['Status' => 'User Created', 'users' => $user], 201);
		} catch (\Throwable $th) {
			DB::rollBack();
		}
    }


    public function show(Request $request, User $user)
    {
        if(!$request->ajax()) return view('user.index', compact('users'));
		return response()->json(['users' => $user	], 200);
    }

	// this
    public function edit(User $user)
    {
		$roles = Role::all()->pluck('name');
		$file = $user->file;
		return view('users.edit', compact('user','roles', 'file'));
    }


    public function update(UserRequest $request, User $user)
    {
		$user->update($request->all());
		$user->syncRoles($request->role);
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

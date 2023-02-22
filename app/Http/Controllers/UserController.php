<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$users = User::all();
		return view('modules.users.index', compact('users'));
	}

	public function show()
	{
		$users = User::all();
		return view('modules.users.index', compact('users'));
	}

	public function create(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|unique:users|max:255',
			'password' => 'required|string|min:8|confirmed',
		]);

		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->input('password'));
		$user->save();

		return redirect()->back()->with('success', 'User Created.');
	}
}

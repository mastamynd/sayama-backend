<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
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
		$members = Member::with('ledgers.member', 'ledgers.transaction', 'county', 'region', 'sub_county', 'transactions')->get();
		return view('modules.members.index', compact('members'));
	}

	public function show($id)
	{
		$member = Member::find($id);
		return view('modules.members.show', compact('member'));
	}
}

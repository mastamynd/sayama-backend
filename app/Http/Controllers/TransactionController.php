<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	private $distribution = [
		"SYMHQ0000" => 295,
		"SYTP0000" => 5
	];

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
		$transactions = Transaction::with('ledgers.member', 'member')->get();
		return view('modules.transactions.index', compact('transactions'));
	}

	public function check_referral($id){
		$transaction = Transaction::find($id);
		// return response()->json($transaction);
		if($transaction->type == "Registration"){
			$member = Member::find($transaction->member_id);
			$hasReferral = trim($member->refferal_code) != "";
			$referalAmount = 200;

			$legdersExist = Ledger::where('transaction_id', $id)->count();

			if($legdersExist == 0){
				if($hasReferral){
					$referralMember = Member::where('member_code', $member->refferal_code)->first();

					if($referralMember){
						$ledger = new Ledger();
						$ledger->transaction_id = $id;
						$ledger->member_id = $referralMember->id;
						$ledger->notes = 'Referral Fee';
						$ledger->debit = $referalAmount;
						$ledger->credit = 0;
						$ledger->save();
						$referalAmount = 0;
					}
				}

				foreach($this->distribution as $memKey=>$amnt){
					$referralMember = Member::where('member_code', $memKey)->first();
					$ledger = new Ledger();
					$ledger->transaction_id = $id;
					$ledger->member_id = $referralMember->id;
					$ledger->notes = 'Registration Fee';
					$ledger->debit = $memKey != "SYMHQ0000" ? $amnt : $referalAmount+$amnt;
					$ledger->credit = 0;
					$ledger->save();
				}
			}
		}

		return response()->json(["status"=>true]);
	}
}

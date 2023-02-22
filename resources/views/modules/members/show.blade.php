@extends('layouts.app')
@section('title')
<title>{{ $member->name }} - Members | {{ config('app.name', 'Laravel') }}</title>
<style rel="stylesheet" type="text/css">
	.mcard {
		padding: 20px;
		margin: 10px;
		min-width: 130px;
		background-color: #fff;
		border: 1px solid #fefefa;
		border-radius: 10px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, .2);
	}

	.mcard .header {
		padding: 20px 10px;
		font-size: 16px;
		font-weight: 600;
		border-bottom: 1px solid #ccc;
		margin-bottom: 10px;
	}

	.mcard .header div {
		display: flex;
		flex-direction: row;
	}

	.mcard .body {
		padding: 10px;
	}

	.mcard .body p {
		padding: 5px;
		margin: 0px !important;
	}

	.mcard .body p:nth-child(odd) {
		border-bottom: 1px solid #f1f1f1;
	}
</style>
@endsection
@section('content')
<div class="container">
	<h2><i class="fas fa-user text-default"></i> {{ $member->name }}</h2>
	<hr style="color:#ccc; border-color: #ccc">
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="mcard">
				<div class="header text-primary">
					<i class="fas fa-info-circle"></i> MEMBER DETAILS
					<small>
						<i class="{{ trim($member->paid) != '' ?  'text-muted fas fa-ban' : 'text-success fas fa-check-circle' }}"></i>
					</small>
				</div>
				<div class="body">
					<p><i class="fas fa-user"></i> <strong>Name:</strong> {{ $member->name }}</p>
					<p><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ $member->phone }}</p>
					<p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $member->email }}</p>
					<p><i class="fas fa-id-card"></i> <strong>ID Number:</strong> {{ $member->id_number }}</p>
					<p><i class="fas fa-users"></i> <strong>Member Number:</strong> {{ $member->member_number }}</p>
					<p><i class="fas fa-share-alt"></i> <strong>Referral Code:</strong> {{ $member->referral_code }}</p>
					<p><i class="far fa-calendar-alt"></i> <strong>Joined:</strong> {{ $member->created_at->format('F j, Y') }}</p>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="mcard table-responsive">
				<div class="header text-success">
					<i class="fas fa-money-bill"></i> TRANSACTIONS
				</div>
				<div class="body">
					<table class="table">
						<thead>
							<tr>
								<th>Transaction</th>
								<th>Notes</th>
								<th>Debit <small class="text-muted">Kshs</small></th>
								<th>Credit <small class="text-muted">Kshs</small></th>
								<th>Transaction Date</th>
							</tr>
						</thead>
						<tbody>
							@php($credits = 0)
							@php($debits = 0)
							@foreach ($member->ledgers as $ledger)
							@php($credits += floatval($ledger->credit ?? 0))
							@php($debits += floatval($ledger->debit ?? 0))
							<tr>
								<td>{{ $ledger->transaction->transaction_code }}</td>
								<td>{{ $ledger->notes }}</td>
								<td>{{ $ledger->debit }}</td>
								<td>{{ $ledger->credit }}</td>
								<td>{{ $ledger->created_at->format('F j, Y') }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th colspan="2">TOTALS</th>
								<th>{{ number_format($credits, 2) }}</th>
								<th>{{ number_format($debits,2) }}</th>
								<th></th>
							</tr>
							<tr>
								@php($balance = $debits - $credits)
								<th colspan="2">Balance:</th>
								<th colspan="3">Kshs {{ number_format($balance, 2) }}</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
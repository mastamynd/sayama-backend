@extends('layouts.app')

@section('content')
<div class="container">
	<h2><i class="fas fa-money-bill text-success"></i> Transactions</h2>
	<hr style="color:#ccc; border-color: #ccc">
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Member</th>
				<th>Member Code</th>
				<th>Amount</th>
				<th>Type</th>
				<th>Reference ID</th>
				<th>Transaction Code</th>
				<th>Phone Number</th>
				<th>Date</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($transactions as $key => $transaction)
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $transaction->member->name }}</td>
				<td>{{ $transaction->member->member_number }}</td>
				<td>{{ $transaction->amount }}</td>
				<td>{{ $transaction->type }}</td>
				<td>{{ $transaction->reference_id }}</td>
				<td>{{ $transaction->transaction_code }}</td>
				<td>{{ $transaction->phone_number }}</td>
				<td>{{ $transaction->created_at->format('F j, Y') }}</td>
				<td>
					<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ledgerModal"
						data-data="{{ json_encode($transaction) }}">
						<i class="fas fa-information-circle"></i> Details
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
@section('scripts')
<div class="modal fade" id="ledgerModal" tabindex="-1" role="dialog" aria-labelledby="ledgerModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ledgerModalLabel">Transaction Details</h5>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>Distribution</th>
							<th>Code</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot></tfoot>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		$('#ledgerModal').on('shown.bs.modal', function(e) {
			let data = $(e.relatedTarget).data('data');
			console.log(data);
			$(this).find('tbody').empty();
			let member = data.member;
			let ledgers = data.ledgers;

			for(let ledger of ledgers){
				console.log(ledger);
				$(this).find('tbody').append(`
				<tr>
					<td>${ledger.member.name}</td>
					<td>${ledger.member.member_code}</td>
					<td>
						<span class="badge bg-green text-default badge-pill" style="background-color:#076201; padding-top: 5px; font-weight: bold">
							${(parseFloat(ledger.debit)/parseFloat(data.amount)*100).toFixed(0)}%
						</span> 
						Kshs ${parseFloat(ledger.debit).toFixed(2)}
					</td>
				</tr>
				`)
			}

			$(this).find('tfoot').html(`<tr><th colspan="2">TRANSACTION AMOUNT</th><th>Kshs. ${parseFloat(data.amount).toFixed(2)}</th></tr>`);
		})
	});
</script>
@endsection
@extends('layouts.app')
@section('title')
<title>Members | {{ config('app.name', 'Laravel') }}</title>
@endsection
@section('content')
<div class="container">
	<div class="table-responsive">
		<h2><i class="fas fa-users text-primary"></i> Members</h2>
		<hr style="color:#ccc; border-color: #ccc">
		<table class="table table-hover table-collapsed">
			<thead>
				<thead class="table-light">
					<tr>
						<th></th>
						<th>Code</th>
						<th>Name</th>
						<th>Phone</th>
						<th>ID Number</th>
						<th>Referral Code</th>
						<th>Region</th>
						<th>County</th>
						<th>Sub County</th>
						<th>Paid</th>
						<th>Joined On</th>
						<th></th>
					</tr>
				</thead>
			<tbody class="table-group-divider">
				@foreach ($members as $member)
				<tr>
					<td scope="row">{{ $loop->iteration }}</td>
					<td>{{ $member->member_code }}</td>
					<td>{{ $member->name }}</td>
					<td>{{ $member->phone_number }}</td>
					<td>{{ $member->id_number }}</td>
					<td>{{ $member->refferal_code }}</td>
					<td>{{ $member->region->name ?? '-' }}</td>
					<td>{{ $member->county->name ?? '-' }}</td>
					<td>{{ $member->sub_county->name ?? '-' }}</td>
					<td>
						@if(trim($member->date_paid) == "")
						<i class="fas fa-hour-glass text-warning"></i>
						@else
						<i class="fas fa-check-circle text-success"></i>
						@endif
					</td>
					<td>{{ $member->created_at }}</td>
					<td>
						<a class="btn btn-transparent text-danger" href="{{ route('members.show', $member->id) }}"><i class="fas fa-arrow-right"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
			</tfoot>
		</table>
	</div>

</div>
@endsection
@extends('layouts.app')
@section('title')
<title>Users | {{ config('app.name', 'Laravel') }}</title>
@endsection
@section('content')
<div class="container">
	<div class="table-responsive">
		<h2>
			<i class="fas fa-user-friends text-primary"></i> Users
			<button class="pull-right float-right btn btn-primary btn-sm" data-bs-toggle="modal"
				data-bs-target="#registrationModal">
				<i class="fas fa-plus"></i> Create User
			</button>
		</h2>
		<hr style="color:#ccc; border-color: #ccc">
		<table class="table table-hover table-collapsed">
			<thead>
				<thead class="table-light">
					<tr>
						<th></th>
						<th>Name</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
			<tbody class="table-group-divider">
				@foreach ($users as $user)
				<tr>
					<td scope="row">{{ $loop->iteration }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
			</tfoot>
		</table>
	</div>
</div>
@endsection
@section('scripts')
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="ledgerModalLabel"
	aria-hidden="true">
	<form class="modal-dialog" role="document" action="{{ route('users.create') }}" method="post">
		@csrf
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ledgerModalLabel">User Details</h5>
			</div>
			<div class="modal-body">
				<div class="row m-3">
					<label for="name" class="col-form-label">{{ __('Name') }}</label>
					<div class="col-md-12">
						<input id="name" type="text" placeholder="Name..." class="form-control @error('name') is-invalid @enderror" name="name"
							value="{{ old('name') }}" required autocomplete="name" autofocus>

						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="row m-3">
					<label for="email" class="col-form-label">{{ __('Email Address') }}</label>
					<div class="col-md-12">
						<input id="email" type="email" placeholder="Email Address..."
							class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
							autocomplete="email">

						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="row m-3">
					<label for="password" class="col-form-label">{{ __('Password') }}</label>
					<div class="col-md-12">
						<input id="password" type="password" placeholder="Password..."
							class="form-control @error('password') is-invalid @enderror" name="password" required
							autocomplete="new-password">

						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="row m-3">
					<label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>

					<div class="col-md-12">
						<input id="password-confirm" type="password" placeholder="Confirm Password..." class="form-control"
							name="password_confirmation" required autocomplete="new-password">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Create</button>
				<button type="button" class="btn btn-transparent" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</form>
</div>
@endsection
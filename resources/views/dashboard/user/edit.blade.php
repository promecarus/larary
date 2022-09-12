@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Edit User</h2>
	</div>
	<form action="/dashboard/user/{{ $user->username }}" method="post">
		@csrf
		@method('put')
		<div class="form-floating mb-3">
			<input autocomplete="off" autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name"
				placeholder="name" type="name" value="{{ old('name', $user->name) }}">
			<label for="name">Name</label>
			@error('name')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="is_admin">Is Admin</label>
			<select class="form-select form-control @error('is_admin') is-invalid @enderror" id="is_admin" name="is_admin">
				<option {{ $user->is_admin == true ? 'selected' : '' }} value="1">True</option>
				<option {{ $user->is_admin == false ? 'selected' : '' }} value="0">False</option>
			</select>
			@error('is_admin')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<button class="btn btn-primary mb-3" type="submit">Submit</button>
	</form>
@endsection

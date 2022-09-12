@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Add New Publisher</h2>
	</div>
	<form action="/dashboard/publisher" method="post">
		@csrf
		<div class="form-floating mb-3">
			<input autocomplete="off" autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name"
				placeholder="name" required type="text" value="{{ old('name') }}">
			<label for="name">Name</label>
			@error('name')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>
		<button class="btn btn-primary mb-3" type="submit">Create</button>
	</form>
@endsection

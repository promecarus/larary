@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>

	{{-- <form action="collection"></form> --}}

	<form action="{{ route('collection.store') }}" method="POST">
		@csrf
		<div class="mb-3">
			<label class="form-label" for="name">Name</label>
			<input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="name"
				value="{{ old('name') ?? '' }}">
			@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<button class="btn btn-primary mt-3" type="submit">Create</button>
		</div>
	</form>
@endsection

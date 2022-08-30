@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>

	{{-- <form action="collection"></form> --}}

	<form action="{{ route('collection.update', ['collection' => $collection->slug]) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label class="form-label" for="name">Name</label>
			<input autocomplete="off" autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name"
				type="name" value="{{ old('name') ?? $collection->name }}">
			@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<button class="btn btn-primary mt-3" type="submit">Edit</button>
		</div>
	</form>
@endsection

@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>
	{{-- <form action="{{ route('collection.store') }}" method="post"> --}}
	<form action="/services/crud/collection" method="post">
		@csrf
		<div class="mb-3">
			<label class="form-label" for="name">Name</label>
			<input autocomplete="off" autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name"
				required type="name" value="{{ old('name') ?? '' }}">
			@error('name')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<button class="btn btn-primary mt-3" type="submit">Create</button>
		</div>
	</form>
@endsection

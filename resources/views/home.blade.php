@extends('layouts.main')

@section('container')
	@if (session()->has('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{{ session('error') }}
			<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
		</div>
	@endif
	<h1 class="mb-3">{{ $title }}</h1>
@endsection

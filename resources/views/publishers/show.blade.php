@extends('layouts.main')

@section('container')
	<h1 class="mb-3">Publisher: {{ $publisher->name }}</h1>
	@include('components.table')
@endsection

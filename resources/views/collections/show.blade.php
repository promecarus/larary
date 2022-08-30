@php
use App\Models\Book;
$books = Book::all();
@endphp

@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>
@endsection

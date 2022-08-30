@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>
	<div class="mb-3">
		<a class="btn btn-success" href="/services/crud/collection">
			<i class="bi bi-arrow-left-square"></i>
		</a>

		<a class="btn btn-warning" href="/services/crud/collection/{{ $collection->slug }}/edit">
			<i class="bi bi-pencil-square"></i>
		</a>

		<form action="/services/crud/collection/{{ $collection->slug }}" class="d-inline" method="POST">
			@csrf
			@method('delete')
			<button class="btn btn-danger border-0">
				<i class="bi bi-trash"></i>
			</button>
		</form>
	</div>

	<table class="table-hover mb-3 table">
		<tbody>
			<tr>
				<th scope="col">
					ID
				</th>
				<td scope="col">
					{{ $collection->id }}
				</td>
			</tr>
			<tr>
				<th>
					Name
				</th>
				<td>
					{{ $collection->name }}
				</td>
			</tr>
			<tr>
				<th>
					Slug
				</th>
				<td>
					{{ $collection->slug }}
				</td>
			</tr>
			<tr>
				<th>
					Books
				</th>
				<td>
					{{-- {{ $collection->id }} --}}
					data banyak buku
				</td>
			</tr>
		</tbody>
	</table>
@endsection

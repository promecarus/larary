@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>
	<a class="btn btn-primary" href="/services/crud/collection/create">
		<i class="bi bi-plus-square"></i>
	</a>
	<table class="table">
		<thead>
			<tr>
				<th>
					No
				</th>
				<th>
					Nama
				</th>
				<th>
					Slug
				</th>
				<th>
					Action
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($collections as $collection)
				<tr>

					<td>{{ $loop->iteration }}</td>
					<td>{{ $collection->name }}</td>
					<td>{{ $collection->slug }}</td>
					<td>
						<a class="btn btn-info" href="/services/crud/collection/{{ $collection->slug }}">
							<i class="bi bi-eye"></i>
						</a>

						<a class="btn btn-warning" href="/services/crud/collection/{{ $collection->slug }}/edit">
							<i class="bi bi-pencil-square"></i>
						</a>

						<form action="/services/crud/collection/{{ $collection->slug }}" class="d-inline" method="POST">
							@csrf
							@method('delete')
							<button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
								<i class="bi bi-trash"></i>
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

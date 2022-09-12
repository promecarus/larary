@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Show Book</h2>
	</div>
	<div class="mb-3">
		<a class="btn btn-success" href="/dashboard/book">
			<i class="bi bi-arrow-left-square"></i> Back
		</a>

		<a class="btn btn-warning" href="/dashboard/book/{{ $book->slug }}/edit">
			<i class="bi bi-pencil-square"></i> Edit
		</a>

		<form action="/dashboard/book/{{ $book->slug }}" class="d-inline" method="POST">
			@csrf
			@method('delete')
			<button class="btn btn-danger border-0">
				<i class="bi bi-trash"></i> Delete
			</button>
		</form>
	</div>

	<table class="table-hover mb-3 table">
		<tbody>
			<tr>
				<th class="col-3">
					ID
				</th>
				<td>
					{{ $book->id }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Name
				</th>
				<td>
					{{ $book->name }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Slug
				</th>
				<td>
					{{ $book->slug }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Cover
				</th>
				<td>
					@if ($book->cover)
						<img alt="{{ $book->cover }}" src="{{ asset('storage/' . $book->cover) }}" width="150px">
					@else
						{{ 'Not set' }}
					@endif
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Publication date
				</th>
				<td>
					{{ $book->publication_date->format('D, d M Y') ?? '-' }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Quantity
				</th>
				<td>
					{{ $book->availability ?? '-' }} / {{ $book->max_quantity ?? '-' }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Collection
				</th>
				<td>
					<a class="text-decoration-none" href="/dashboard/collection/{{ $book->collection->slug }}">
						{{ $book->collection->name ?? '-' }}
					</a>
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Genre
				</th>
				<td>
					@if (sizeof($book->genres))
						@foreach ($book->genres as $genre)
							<a class="badge bg-info text-decoration-none" href="/dashboard/genre/{{ $genre->slug }}">
								{{ $genre->name }}
							</a>
						@endforeach
					@else
						{{ 'Not set' }}
					@endif
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Publisher
				</th>
				<td>
					<a class="text-decoration-none" href="/dashboard/publisher/{{ $book->publisher->slug }}">
						{{ $book->publisher->name ?? '-' }}
					</a>
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Writer
				</th>
				<td>
					<a class="text-decoration-none" href="/dashboard/writer/{{ $book->writer->slug }}">
						{{ $book->writer->name ?? '-' }}
					</a>
				</td>
			</tr>
		</tbody>
	</table>
@endsection

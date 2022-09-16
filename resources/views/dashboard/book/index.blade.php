@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>{{ $title }}</h2>
	</div>
	<a class="btn btn-primary mb-3" href="/dashboard/book/create">
		<i class="bi bi-plus-square"></i> Add
	</a>
	@if ($books->count())
		<div class="table-responsive">
			<table class="table-hover table-striped table-sm table">
				<thead>
					<tr>
						<th class="text-center" scope="col">#</th>
						<th scope="col">Name</th>
						<th class="text-center" scope="col">Quantity</th>
						<th scope="col">Collection</th>
						<th scope="col">Genre</th>
						<th scope="col">Publisher</th>
						<th scope="col">Writer</th>
						<th class="text-center" scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($books as $book)
						<tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td>{{ $book->name }}</td>
							<td class="text-center">{{ $book->availability }} / {{ $book->max_quantity }}</td>
							<td>
								<a class="text-decoration-none" href="/dashboard/collection/{{ $book->collection->slug }}">
									{{ $book->collection->name }}
								</a>
							</td>
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
							<td>
								<a class="text-decoration-none" href="/dashboard/publisher/{{ $book->publisher->slug }}">
									{{ $book->publisher->name }}
								</a>
							</td>
							<td>
								<a class="text-decoration-none" href="/dashboard/writer/{{ $book->writer->slug }}">
									{{ $book->writer->name }}
								</a>
							</td>
							<td class="text-center">
								<a class="badge bg-info" href="/dashboard/book/{{ $book->slug }}">
									<i class="bi bi-eye"></i>
								</a>
								<a class="badge bg-warning" href="/dashboard/book/{{ $book->slug }}/edit">
									<i class="bi bi-pencil-square"></i>
								</a>
								<form action="/dashboard/book/{{ $book->slug }}" class="d-inline" method="POST">
									@csrf
									@method('delete')
									<button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
										<i class="bi bi-x-square"></i>
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<p class="fs-3 text-center">No data found</p>
	@endif
@endsection

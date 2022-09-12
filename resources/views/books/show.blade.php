@extends('layouts.main')

@section('container')
	<div class="text-center">
		<h1 class="mb-3">{{ $book->name }}</h1>
		@if ($book->cover)
			<img alt="gambar" class="mb-3" src="{{ asset('storage/' . $book->cover) }}" width="300px">
		@else
			<p class="mb-3">
				{{ 'Cover not set yet' }}
			</p>
		@endif

		<div class="table-responsive">
			<table class="table-hover table-striped table-sm table">
				<tbody class="text-start">
					<tr>
						<th class="col-3">
							Publication date
						</th>
						<td>
							{{ $book->publication_date->format('D, d M Y') ?? 'Not set' }}
						</td>
					</tr>
					<tr>
						<th class="col-3">
							Total pages
						</th>
						<td>
							{{ $book->total_pages ?? 'Not set' }}
						</td>
					</tr>
					<tr>
						<th class="col-3">
							ISBN
						</th>
						<td>
							{{ $book->isbn ?? 'Not set' }}
						</td>
					</tr>
					<tr>
						<th class="col-3">
							Description
						</th>
						<td>
							{{ $book->description ?? 'Not set' }}
						</td>
					</tr>
					<tr>
						<th class="col-3">
							Quantity
						</th>
						<td>
							{{ $book->availability ?? 'Not set' }} / {{ $book->max_quantity ?? 'Not set' }}
						</td>
					</tr>
					<tr>
						<th class="col-3">
							Writer
						</th>
						<td>
							<a class="text-decoration-none" href="/writers/{{ $book->writer->slug }}">
								{{ $book->writer->name ?? 'Not set' }}
							</a>
						</td>
					</tr>
					<tr>
						<th class="col-3">
							Publisher
						</th>
						<td>
							<a class="text-decoration-none" href="/publishers/{{ $book->publisher->slug }}">
								{{ $book->publisher->name ?? 'Not set' }}
							</a>
						</td>
					</tr>
					<tr>
						<th class="col-3">
							Collection
						</th>
						<td>
							<a class="text-decoration-none" href="/collections/{{ $book->collection->slug }}">
								{{ $book->collection->name ?? 'Not set' }}
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
									<a class="text-decoration-none badge bg-info" href="/genres/{{ $genre->slug }}">
										{{ $genre->name }}
									</a>
								@endforeach
							@else
								{{ 'Not set' }}
							@endif
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection

@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>
	<a class="btn btn-primary" href="/services/crud/collection/create">Create</a>
	<div class="container">
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
							<a class="btn btn-primary" href="{{ route('collection.edit', ['collection' => $collection->slug]) }}">Update</a>
							<form action="{{ route('collection.destroy', ['collection' => $collection->slug]) }}" method="POST">
								@csrf
								@method('delete')
								<button class="btn btn-primary">
									Delete
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

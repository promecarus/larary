@extends('layouts.main')

@section('container')
	<h1>{{ $title }}</h1>
	<a class="btn btn-primary" href="/collection/create">Create</a>
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
					Action
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($collections as $collection)
				<tr>

					<td>{{ $loop->iteration }}</td>
					<td>{{ $collection->name }}</td>
					<td>
						<a href="{{ route('collection.edit', ['collection' => $collection->id]) }}">Edit</a> |
						<form action="{{ route('collection.destroy', ['collection' => $collection->id]) }}" method="POST">
							@csrf
							@method('delete')
							<button>
								Delete
							</button>
						</form>
					</td>
				</tr>
			@endforeach
			{{-- <tr>
                for
				<td colspan="3">Tidak ada data</td>
			</tr> --}}
		</tbody>
	</table>
@endsection

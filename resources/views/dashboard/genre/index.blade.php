@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Genre</h2>
	</div>
	<a class="btn btn-primary mb-3" href="/dashboard/genre/create">
		<i class="bi bi-plus-square"></i> Add
	</a>

	<div class="table-responsive">
		<table class="table-hover table-striped table-sm table">
			<thead>
				<tr>
					<th class="text-center" scope="col">#</th>
					<th scope="col">Name</th>
					<th class="text-center" scope="col">Books count</th>
					<th class="text-center" scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($genres as $genre)
					<tr>
						<td class="text-center">{{ $loop->iteration }}</td>
						<td>{{ $genre->name }}</td>
						<td class="text-center">{{ $genre->books_count }}</td>
						<td class="text-center">
							<a class="badge bg-info" href="/dashboard/genre/{{ $genre->slug }}">
								<i class="bi bi-eye"></i>
							</a>
							<a class="badge bg-warning" href="/dashboard/genre/{{ $genre->slug }}/edit">
								<i class="bi bi-pencil-square"></i>
							</a>
							<form action="/dashboard/genre/{{ $genre->slug }}" class="d-inline" method="POST">
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
@endsection

@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>{{ $title }}</h2>
	</div>
	@if ($borroweds->count())
		<div class="table-responsive">
			<table class="table-hover table-striped table-sm table">
				<thead>
					<tr>
						<th class="text-center" scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Borrow date</th>
						<th scope="col">Due date</th>
						<th class="text-center" scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($borroweds as $borrow)
						<tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td>
								<a class="text-decoration-none" href="/books/{{ $borrow->book->slug }}">
									{{ $borrow->book->name }}
								</a>
							</td>
							<td>
								{{ $borrow->created_at->format('D, d M Y') }}
							</td>
							<td>
								{{ $borrow->created_at->addDays(3)->format('D, d M Y') }}
							</td>
							<td class="text-center">
								<a class="badge bg-info" href="/borrowed/{{ $borrow->id }}">
									<i class="bi bi-eye"></i>
								</a>
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

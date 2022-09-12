@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>{{ $title }}</h2>
	</div>
	<a class="btn btn-primary mb-3" href="/dashboard/borrow/create">
		<i class="bi bi-plus-square"></i> Add
	</a>
	@if ($borrowed_books->count())
		<div class="table-responsive">
			<table class="table-hover table-striped table-sm table">
				<thead>
					<tr>
						<th class="text-center" scope="col">#</th>
						<th scope="col">Borrower</th>
						<th scope="col">Borrowed book</th>
						<th scope="col">Borrowed date</th>
						<th scope="col">Due date</th>
						<th class="text-center" scope="col">Returned</th>
						<th class="text-center" scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($borrowed_books as $borrowed)
						<tr>
							<td class="text-center">{{ $loop->iteration }}</td>
							<td>
								<a class="text-decoration-none" href="/dashboard/user/{{ $borrowed->user->username }}">
									{{ $borrowed->user->name }}
								</a>
							</td>
							<td>
								<a class="text-decoration-none" href="/dashboard/book/{{ $borrowed->book->slug }}">
									{{ $borrowed->book->name }}
								</a>
							</td>
							<td>{{ $borrowed->created_at->format('D, d M Y') }}</td>
							<td>{{ $borrowed->created_at->addDays(3)->format('D, d M Y') }}</td>
							<td class="text-center">
								{{ $borrowed->is_returned == true ? '✅' : '' }}
							</td>
							<td class="text-center">
								<a class="badge bg-info" href="/dashboard/borrow/{{ $borrowed->id }}">
									<i class="bi bi-eye"></i>
								</a>
								@if (!$borrowed->is_returned)
									<form action="/dashboard/borrow/{{ $borrowed->id }}" class="d-inline" method="post">
										@csrf
										@method('put')
										<button class="badge bg-danger border-0" type="submit">
											<i class="bi bi-r-square"></i>
										</button>
									</form>
								@endif
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

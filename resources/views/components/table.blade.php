@if ($books->count())
	<div class="table-responsive">
		<table class="table-hover table-striped table-sm table">
			<thead>
				<tr>
					<th class="text-center" scope="col">#</th>
					<th scope="col">Name</th>
					<th class="text-center" scope="col">Quantity</th>
					<th class="text-center" scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($books as $book)
					<tr>
						<th class="text-center">{{ $loop->iteration }}</th>
						<td>{{ $book->name }}</td>
						<td class="text-center">{{ $book->availability . ' / ' . $book->max_quantity }}</td>
						<td class="text-center">
							<a class="badge bg-info" href="/books/{{ $book->slug }}">
								<i class="bi bi-eye"></i>
							</a>
							@if (Auth::user())
								@if (Auth::user()->is_admin == true)
									<a class="badge bg-success" href="/dashboard/borrow/create?book_id={{ $book->id }}">
										<i class="bi bi-bootstrap"></i>
									</a>
									{{-- <form action="/dashboard/borrow/create" class="d-inline" method="get">
											<input name="book_id" type="hidden" value="{{ $book->id }}">
											<button class="badge bg-success border-0">
												<i class="bi bi-bootstrap"></i>
											</button>
										</form> --}}
								@endif
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@else
	<p class="fs-3 text-center">No book found</p>
@endif

@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Show Borrowed Book</h2>
	</div>
	<div class="mb-3">
		<a class="btn btn-success" href="/dashboard/borrow">
			<i class="bi bi-arrow-left-square"></i> Back
		</a>
		@if (!$borrow->is_returned)
			<form action="/dashboard/borrow/{{ $borrow->id }}" class="d-inline" method="post">
				@csrf
				@method('put')
				<button class="btn btn-danger border-0" type="submit">
					<i class="bi bi-r-square"></i> Return
				</button>
			</form>
		@endif
	</div>

	<table class="table-hover mb-3 table">
		<tbody>
			<tr>
				<th class="col-3">
					Borrower
				</th>
				<td>
					<a class="text-decoration-none" href="/dashboard/user/{{ $borrow->user->username }}">
						{{ $borrow->user->name }}
					</a>
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Borrowed book
				</th>
				<td><a class="text-decoration-none" href="/dashboard/book/{{ $borrow->book->slug }}">
						{{ $borrow->book->name }}
					</a>
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Borrow date
				</th>
				<td>
					{{ $borrow->created_at->format('D, d M Y') }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Due date
				</th>
				<td>
					{{ $borrow->created_at->addDays(3)->format('D, d M Y') }}
				</td>
			</tr>
			@if ($borrow->created_at->diffInSeconds($borrow->updated_at))
				<tr>
					<th class="col-3">
						Return date
					</th>
					<td>
						{{ $borrow->updated_at->format('D, d M Y') }}
					</td>
				</tr>
				@if ($borrow->created_at->diffInDays($borrow->updated_at))
					<tr>
						<th class="col-3">
							Fine
						</th>
						<td>
							@currency($borrow->updated_at->diffInDays($borrow->created_at->addDays(3)) * 1000)
						</td>
					</tr>
				@endif
			@endif
		</tbody>
	</table>
@endsection

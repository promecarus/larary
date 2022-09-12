@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>{{ $title }}</h2>
	</div>
	<div class="mb-3">
		<a class="btn btn-success" href="/borrowed">
			<i class="bi bi-arrow-left-square"></i> Back
		</a>
	</div>
	<table class="table-hover mb-3 table">
		<tbody>
			<tr>
				<th class="col-3">
					Borrowed book
				</th>
				<td>
					<a class="text-decoration-none" href="/books/{{ $borrowed_book->book->slug }}">
						{{ $borrowed_book->book->name }}
					</a>
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Borrow date
				</th>
				<td>
					{{ $borrowed_book->created_at->format('D, d M Y') }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Due date
				</th>
				<td>
					{{ $borrowed_book->created_at->addDays(3)->format('D, d M Y') }}
				</td>
			</tr>
		</tbody>
	</table>
@endsection

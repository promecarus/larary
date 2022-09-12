@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>{{ $title }}</h2>
	</div>
	<div class="mb-3">
		<a class="btn btn-success" href="/returned">
			<i class="bi bi-arrow-left-square"></i> Back
		</a>
	</div>
	<table class="table-hover mb-3 table">
		<tbody>
			<tr>
				<th class="col-3">
					Returned book
				</th>
				<td>
					<a class="text-decoration-none" href="/books/{{ $returned_book->book->slug }}">
						{{ $returned_book->book->name }}
					</a>
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Borrow date
				</th>
				<td>
					{{ $returned_book->created_at->format('D, d M Y') }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Due date
				</th>
				<td>
					{{ $returned_book->created_at->addDays(3)->format('D, d M Y') }}
				</td>
			</tr>
			<tr>
				<th class="col-3">
					Return date
				</th>
				<td>
					{{ $returned_book->updated_at->format('D, d M Y') }}
				</td>
			</tr>
			@if ($returned_book->updated_at->diffInDays($returned_book->created_at->addDays(3), false) < 0)
				<tr>
					<th class="col-3">
						Fine
					</th>
					<td>
						@currency($returned_book->updated_at->diffInDays($returned_book->created_at->addDays(3)) * 1000)
					</td>
				</tr>
			@endif
		</tbody>
	</table>
@endsection

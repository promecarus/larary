@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Show Publisher</h2>
	</div>
	<div class="mb-3">
		<a class="btn btn-success" href="/dashboard/publisher">
			<i class="bi bi-arrow-left-square"></i> Back
		</a>

		<a class="btn btn-warning" href="/dashboard/publisher/{{ $publisher->slug }}/edit">
			<i class="bi bi-pencil-square"></i> Edit
		</a>

		<form action="/dashboard/publisher/{{ $publisher->slug }}" class="d-inline" method="POST">
			@csrf
			@method('delete')
			<button class="btn btn-danger border-0">
				<i class="bi bi-trash"></i> Delete
			</button>
		</form>
	</div>

	<table class="table-hover mb-3 table">
		<tbody>
			<tr>
				<th>
					ID
				</th>
				<td>
					{{ $publisher->id }}
				</td>
			</tr>
			<tr>
				<th>
					Name
				</th>
				<td>
					{{ $publisher->name }}
				</td>
			</tr>
			<tr>
				<th>
					Slug
				</th>
				<td>
					{{ $publisher->slug }}
				</td>
			</tr>
			<tr>
				<th>
					Books count
				</th>
				<td>
					{{ $publisher->books->count() }}
				</td>
			</tr>
		</tbody>
	</table>
@endsection
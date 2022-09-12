@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Show Writer</h2>
	</div>
	<div class="mb-3">
		<a class="btn btn-success" href="/dashboard/writer">
			<i class="bi bi-arrow-left-square"></i> Back
		</a>

		<a class="btn btn-warning" href="/dashboard/writer/{{ $writer->slug }}/edit">
			<i class="bi bi-pencil-square"></i> Edit
		</a>

		<form action="/dashboard/writer/{{ $writer->slug }}" class="d-inline" method="POST">
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
					{{ $writer->id }}
				</td>
			</tr>
			<tr>
				<th>
					Name
				</th>
				<td>
					{{ $writer->name }}
				</td>
			</tr>
			<tr>
				<th>
					Slug
				</th>
				<td>
					{{ $writer->slug }}
				</td>
			</tr>
			<tr>
				<th>
					Books count
				</th>
				<td>
					{{ $writer->books->count() }}
				</td>
			</tr>
		</tbody>
	</table>
@endsection

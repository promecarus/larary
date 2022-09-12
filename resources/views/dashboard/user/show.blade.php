@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Show User</h2>
	</div>
	<div class="mb-3">
		<a class="btn btn-success" href="/dashboard/user">
			<i class="bi bi-arrow-left-square"></i> Back
		</a>

		<a class="btn btn-warning" href="/dashboard/user/{{ $user->username }}/edit">
			<i class="bi bi-pencil-square"></i> Edit
		</a>

		<form action="/dashboard/user/{{ $user->username }}" class="d-inline" method="POST">
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
					{{ $user->id }}
				</td>
			</tr>
			<tr>
				<th>
					Name
				</th>
				<td>
					{{ $user->name }}
				</td>
			</tr>
			<tr>
				<th>
					Username
				</th>
				<td>
					{{ $user->username }}
				</td>
			</tr>
			<tr>
				<th>
					Email
				</th>
				<td>
					{{ $user->email }}
				</td>
			</tr>
		</tbody>
	</table>
@endsection

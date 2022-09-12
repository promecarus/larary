@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>User</h2>
	</div>

	<div class="table-responsive">
		<table class="table-hover table-striped table-sm table">
			<thead>
				<tr>
					<th class="text-center" scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th class="text-center" scope="col">Admin</th>
					<th class="text-center" scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td class="text-center">{{ $loop->iteration }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td class="text-center">{{ $user->is_admin == true ? '✅' : '' }}</td>
						<td class="text-center">
							<a class="badge bg-info" href="/dashboard/user/{{ $user->username }}">
								<i class="bi bi-eye"></i>
							</a>
							<a class="badge bg-warning" href="/dashboard/user/{{ $user->username }}/edit">
								<i class="bi bi-pencil-square"></i>
							</a>
							<form action="/dashboard/user/{{ $user->username }}" class="d-inline" method="POST">
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

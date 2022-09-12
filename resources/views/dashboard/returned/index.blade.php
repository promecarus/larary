@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>{{ $title }}</h2>
	</div>
	@if ($returneds->count())
		<div class="table-responsive">
			<table class="table-hover table-striped table-sm table">
				<thead>
					<tr>
						<th class="text-center" scope="col">
							#
						</th>
						<th scope="col">
							Name
						</th>
						<th scope="col">
							Borrowed date
						</th>
						<th scope="col">
							Returned date
						</th>
						<th scope="col">
							Lateness
						</th>
						<th class="text-center" scope="col">
							Action
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($returneds as $returned)
						<tr>
							<td class="text-center">
								{{ $loop->iteration }}
							</td>
							<td>
								<a class="text-decoration-none" href="/books/{{ $returned->book->slug }}">
									{{ $returned->book->name }}
								</a>
							</td>
							<td>
								{{ $returned->created_at->format('D, d M Y') }}
							</td>
							<td>
								{{ $returned->updated_at->format('D, d M Y') }}
							</td>
							<td>
								@if ($returned->updated_at->diffInDays($returned->created_at->addDays(3), false) > -1)
									{{ 'Not late' }}
								@elseif ($returned->updated_at->diffInDays($returned->created_at->addDays(3), false) == -1)
									{{ '1 day late' }}
								@else
									{{ -$returned->updated_at->diffInDays($returned->created_at->addDays(3), false) . ' days late' }}
								@endif
							</td>
							<td class="text-center">
								<a class="badge bg-info" href="/returned/{{ $returned->id }}">
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

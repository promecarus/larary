@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h1 class="h2">Dashboard</h1>
	</div>
	<div class="row">
		<div class="col-md-6 col-xl-6">
			<div class="card bg-light mb-4">
				<div class="card-body">
					Total Borrow
					<h2>{{ $borrows_count }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-dark" href="/dashboard/borrow">View Details</a>
					<div class="small text-dark"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-6">
			<div class="card bg-dark mb-4 text-white">
				<div class="card-body">
					Total Return
					<h2>{{ $returns_count }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-white" href="/dashboard/borrow">View Details</a>
					<div class="small text-white"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xl-4">
			<div class="card bg-primary mb-4 text-white">
				<div class="card-body">
					Total Users
					<h2>{{ $users_count }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-white" href="/dashboard/user">View Details</a>
					<div class="small text-white"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="card bg-secondary mb-4 text-white">
				<div class="card-body">
					Total Books
					<h2>{{ $books_count . ' [' . $book_availability . '/' . $books_quantity . ']' }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-white" href="/dashboard/book">View Details</a>
					<div class="small text-white"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="card bg-success mb-4 text-white">
				<div class="card-body">
					Total Collections
					<h2>{{ $collections_count }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-white" href="/dashboard/collection">View Details</a>
					<div class="small text-white"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="card bg-danger mb-4 text-white">
				<div class="card-body">
					Total Genres
					<h2>{{ $genres_count }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-white" href="/dashboard/genre">View Details</a>
					<div class="small text-white"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="card bg-warning mb-4 text-white">
				<div class="card-body">
					Total Publishers
					<h2>{{ $publishers_count }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-white" href="/dashboard/publisher">View Details</a>
					<div class="small text-white"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
			<div class="card bg-info mb-4 text-white">
				<div class="card-body">
					Total Writers
					<h2>{{ $writers_count }}</h2>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small stretched-link text-decoration-none text-white" href="/dashboard/writer">View Details</a>
					<div class="small text-white"><i class="bi bi-chevron-compact-right"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

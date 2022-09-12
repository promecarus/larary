@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Add New Borrow</h2>
	</div>
	<form action="/dashboard/borrow" method="post">
		@csrf

		<div class="mb-3">
			<label for="book_id">Book</label>
			{{-- <select autofocus class="form-select form-control @error('book_id') is-invalid @enderror" id="book_id" name="book_id"
				required> --}}
			<select {{ $_GET['book_id'] ?? '' != '' ? '' : 'autofocus' }}
				class="form-select form-control @error('book_id') is-invalid @enderror" id="book_id" name="book_id" required>
				<option hidden value="">
					Select one
				</option>
				@foreach ($books as $book)
					<option {{ old('book_id', $_GET['book_id'] ?? '') == $book->id ? 'selected' : '' }} value="{{ $book->id }}">
						{{ $book->name }}
					</option>
				@endforeach
			</select>
			@error('book_id')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="user_id">Borrower</label>
			<select {{ $_GET['book_id'] ?? '' == '' ? 'autofocus' : '' }}
				class="form-select form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
				<option hidden value="">
					Select one
				</option>
				@foreach ($borrowers as $borrower)
					<option {{ old('user_id') == $borrower->id ? 'selected' : '' }} value="{{ $borrower->id }}">
						{{ $borrower->name }}
					</option>
				@endforeach
			</select>
			@error('user_id')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<button class="btn btn-primary mb-3" type="submit">Create</button>
		</div>
	</form>
@endsection

@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Edit Book</h2>
	</div>
	<form action="/dashboard/book/{{ $book->slug }}" enctype="multipart/form-data" method="post">
		@csrf
		@method('put')

		<input name="old_cover" type="hidden" value="{{ $book->cover }}">

		<div class="form-floating mb-3">
			<input autocomplete="off" autofocus class="form-control @error('name') is-invalid @enderror" id="name"
				name="name" placeholder="name" required type="text" value="{{ old('name', $book->name) }}">
			<label class="form-label" for="name">Name</label>
			@error('name')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label" for="cover">Cover file</label>
			<input class="form-control" id="cover" name="cover" type="file">
			@error('cover')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="publication_date">Publication date</label>
			<input autocomplete="off" class="form-control @error('publication_date') is-invalid @enderror" id="publication_date"
				name="publication_date" type="date" value="{{ old('publication_date', $book->publication_date) }}">
			@error('publication_date')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<input autocomplete="off" class="form-control @error('total_pages') is-invalid @enderror" id="total_pages"
				name="total_pages" placeholder="total_pages" type="number" value="{{ old('total_pages', $book->total_pages) }}">
			<label for="total_pages">Total pages</label>
			@error('total_pages')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<input autocomplete="off" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"
				placeholder="isbn" type="text" value="{{ old('isbn', $book->isbn) }}">
			<label for="isbn">ISBN</label>
			@error('isbn')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<textarea autocomplete="off" class="form-control @error('description') is-invalid @enderror" id="description"
			 name="description" placeholder="description">{{ old('description', $book->description) }}</textarea>
			<label for="description">Description</label>
			@error('description')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<input autocomplete="off" class="form-control @error('max_quantity') is-invalid @enderror" id="max_quantity"
				name="max_quantity" placeholder="Quantity" type="number" value="{{ old('max_quantity', $book->max_quantity) }}">
			<label for="max_quantity">Quantity</label>
			@error('max_quantity')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="writer_id">Writer</label>
			<select class="form-select form-control @error('writer_id') is-invalid @enderror" id="writer_id" name="writer_id">
				@foreach ($writers as $writer)
					@if (old('writer_id', $book->writer_id) == $writer->id)
						<option selected value="{{ $writer->id }}">{{ $writer->name }}</option>
					@else
						<option value="{{ $writer->id }}">{{ $writer->name }}</option>
					@endif
				@endforeach
			</select>
			@error('writer_id')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="publisher_id">Publisher</label>
			<select class="form-select form-control @error('publisher_id') is-invalid @enderror" id="publisher_id"
				name="publisher_id">
				@foreach ($publishers as $publisher)
					@if (old('publisher_id', $book->publisher_id) == $publisher->id)
						<option selected value="{{ $publisher->id }}">{{ $publisher->name }}</option>
					@else
						<option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
					@endif
				@endforeach
			</select>
			@error('publisher_id')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="collection_id">Collection</label>
			<select class="form-select form-control @error('collection_id') is-invalid @enderror" id="collection_id"
				name="collection_id">
				@foreach ($collections as $collection)
					@if (old('collection_id', $book->collection_id) == $collection->id)
						<option selected value="{{ $collection->id }}">{{ $collection->name }}</option>
					@else
						<option value="{{ $collection->id }}">{{ $collection->name }}</option>
					@endif
				@endforeach
			</select>
			@error('collection_id')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		{{-- https://stackoverflow.com/questions/41966620/laravel-get-values-of-checkboxes --}}
		<div class="mb-3">
			<label>Genres</label>
			@foreach ($genres as $genre)
				<div class="form-check">
					<label class="form-check-label">
						<input @checked(old('genre_id')
								? in_array($genre->id, old('genre_id'))
								: $book->genres()->where('genre_id', $genre->id)->exists()) class="form-check-input" id="genre_id" name="genre_id[]" type="checkbox"
							value="{{ $genre->id }}">
						{{ $genre->name }}
					</label>
				</div>
			@endforeach
		</div>

		<button class="btn btn-primary mb-3" type="submit">Edit</button>
		</div>
	</form>
@endsection

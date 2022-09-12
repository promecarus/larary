@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
		<h2>Add New Book</h2>
	</div>
	<form action="/dashboard/book" enctype="multipart/form-data" method="post">
		@csrf
		<div class="form-floating mb-3">
			<input autocomplete="off" autofocus class="form-control @error('name') is-invalid @enderror" id="name" name="name"
				placeholder="name" required type="text" value="{{ old('name') }}">
			<label class="form-label" for="name">Name</label>
			@error('name')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label class="form-label" for="cover">Cover file</label>
			<input class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" type="file">
			@error('cover')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="publication_date">Publication date</label>
			<input autocomplete="off" class="form-control @error('publication_date') is-invalid @enderror" id="publication_date"
				name="publication_date" required type="date" value="{{ old('publication_date') }}">
			@error('publication_date')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<input autocomplete="off" class="form-control @error('total_pages') is-invalid @enderror" id="total_pages"
				name="total_pages" placeholder="total_pages" required type="number" value="{{ old('total_pages') }}">
			<label for="total_pages">Total pages</label>
			@error('total_pages')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<input autocomplete="off" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"
				placeholder="isbn" required type="text" value="{{ old('isbn') }}">
			<label for="isbn">ISBN</label>
			@error('isbn')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<textarea autocomplete="off" class="form-control @error('description') is-invalid @enderror" id="description"
			 name="description" placeholder="description" required>{{ old('description') }}</textarea>
			<label for="description">Description</label>
			@error('description')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-floating mb-3">
			<input autocomplete="off" class="form-control @error('max_quantity') is-invalid @enderror" id="max_quantity"
				name="max_quantity" placeholder="Quantity" required type="number" value="{{ old('max_quantity') }}">
			<label for="max_quantity">Quantity</label>
			@error('max_quantity')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="writer_id">Writer</label>
			<select class="form-select form-control @error('writer_id') is-invalid @enderror" id="writer_id" name="writer_id"
				required>
				<option hidden value="">
					Select one
				</option>
				@foreach ($writers as $writer)
					<option {{ old('writer_id') == $writer->id ? 'selected' : '' }} value="{{ $writer->id }}">
						{{ $writer->name }}
					</option>
				@endforeach
			</select>
			@error('writer_id')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="publisher_id">Publisher</label>
			<select class="form-select form-control @error('publisher_id') is-invalid @enderror" id="publisher_id"
				name="publisher_id" required>
				<option hidden value="">
					Select one
				</option>
				@foreach ($publishers as $publisher)
					<option {{ old('publisher_id') == $publisher->id ? 'selected' : '' }} value="{{ $publisher->id }}">
						{{ $publisher->name }}
					</option>
				@endforeach
			</select>
			@error('publisher_id')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="collection_id">Collection
			</label>
			<select class="form-select form-control @error('collection_id') is-invalid @enderror" id="collection_id"
				name="collection_id" required>
				<option hidden value="">
					Select one
				</option>
				@foreach ($collections as $collection)
					<option {{ old('collection_id') == $collection->id ? 'selected' : '' }} value="{{ $collection->id }}">
						{{ $collection->name }}
					</option>
				@endforeach
			</select>
			@error('collection_id')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		{{-- https://stackoverflow.com/questions/39521726/how-to-show-old-data-of-dynamic-checkbox-in-laravel#:~:text=not%20create%20variable-,%40if(is_array(old(%27hobby%27))%20%26%26%20in_array(1%2Cold(%27hobby%27)))%20checked%20%40endif,-and%20then%20apply --}}
		<div class="mb-3">
			<label>Genres</label>
			@foreach ($genres as $genre)
				<div class="form-check">
					<label class="form-check-label">
						<input {{ is_array(old('genre_id')) && in_array($genre->id, old('genre_id')) ? 'checked' : '' }}
							class="form-check-input" id="genre_id" name="genre_id[]" type="checkbox" value="{{ $genre->id }}">
						{{ $genre->name }}
					</label>
				</div>
			@endforeach
		</div>

		<button class="btn btn-primary mb-3" type="submit">Create</button>
		</div>
	</form>
@endsection

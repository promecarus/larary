<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BookController extends Controller
{
    public function index()
    {
        return view("dashboard.book.index", [
            "title" => "Book",
            "books" => Book::with(["collection", "publisher", "writer", "genres"])->get()->sortBy("name"),
        ]);
    }

    public function create()
    {
        return view('dashboard.book.create', [
            "title" => "Create New Book",
            "collections" => Collection::get(),
            "genres" => Genre::get(),
            "publishers" => Publisher::get(),
            "writers" => Writer::get(),
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->slug = SlugService::createSlug(Book::class, "slug", $request->name);

        if ($request->file("cover")) {
            $book->cover = $request->file("cover")->store("img");
        }

        $book->publication_date = $request->publication_date;
        $book->total_pages = $request->total_pages;
        $book->isbn = $request->isbn;
        $book->description = $request->description;
        $book->max_quantity = $request->max_quantity;
        $book->availability = $request->max_quantity;

        $book->writer_id = $request->writer_id;
        $book->publisher_id = $request->publisher_id;
        $book->collection_id = $request->collection_id;

        $book->save();

        if ($request->has("genre_id")) {
            foreach ($request->genre_id as $genre) {
                $book->genres()->attach($genre);
            }
        }

        return redirect('/dashboard/book');
    }

    public function show(Book $book)
    {
        return view("dashboard.book.show", [
            "title" => "Show Book",
            "book" => $book,
        ]);
    }

    public function edit(Book $book)
    {
        return view('dashboard.book.edit', [
            "title" => "Edit Book",
            "book" => $book,
            "collections" => Collection::get(),
            "genres" => Genre::get(),
            "publishers" => Publisher::get(),
            "writers" => Writer::get(),
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        if ($book->name != $request->name) {
            $book->slug = SlugService::createSlug(Collection::class, "slug", $request->name);
        }

        $book->name = $request->name;

        if ($request->file("cover")) {
            if ($request->old_cover) {
                Storage::delete($request->old_cover);
            }
            $book->cover = $request->file("cover")->store("img");
        }

        $book->publication_date = $request->publication_date;
        $book->total_pages = $request->total_pages;
        $book->isbn = $request->isbn;
        $book->description = $request->description;

        if ($request->max_quantity != $book->max_quantity) {
            $book->availability += $request->max_quantity - $book->max_quantity;
        }

        $book->max_quantity = $request->max_quantity;

        $book->writer_id = $request->writer_id;
        $book->publisher_id = $request->publisher_id;
        $book->collection_id = $request->collection_id;

        $book->save();

        $book->genres()->detach();

        if ($request->has("genre_id")) {
            foreach ($request->genre_id as $genre) {
                $book->genres()->attach($genre);
            }
        }

        return redirect('/dashboard/book');
    }

    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::delete($book->cover);
        }

        $book->delete();
        return redirect('/dashboard/book');
    }
}
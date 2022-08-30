<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view("book.index", [
            "title" => "Book",
            "books" => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', [
            "title" => "Create New Book",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->slug = SlugService::createSlug(Book::class, "slug", $book->name);
        $book->cover = $request->cover;
        $book->publication_year = $request->publication_year;
        $book->total_pages = $request->total_pages;
        $book->isbn = $request->isbn;
        $book->description = $request->description;
        $book->max_quantity = $request->max_quantity;
        $book->availability = $request->availability;

        $book->writer_id = $request->writer_id;
        $book->publisher_id = $request->publisher_id;
        $book->collection_id = $request->collection_id;
        $book->genre_id = $request->genre_id;

        $book->save();
        return redirect('services/crud/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view("book.show", [
            "title" => "Show Book",
            "book" => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            "title" => "Edit Book",
            "book" => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->name = $request->name;
        $book->slug = Str::of($book->name)->slug('-');
        $book->cover = $request->cover;
        $book->publication_year = $request->publication_year;
        $book->total_pages = $request->total_pages;
        $book->isbn = $request->isbn;
        $book->description = $request->description;
        $book->max_quantity = $request->max_quantity;
        $book->availability = $request->availability;

        $book->writer_id = $request->writer_id;
        $book->publisher_id = $request->publisher_id;
        $book->collection_id = $request->collection_id;
        $book->genre_id = $request->genre_id;

        $book->save();
        return redirect('services/crud/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('services/crud/book');
    }
}
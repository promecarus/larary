<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
    ]);
});

Route::get("/sign-up", [SignUpController::class, "create"])->middleware("guest");
Route::post("/sign-up", [SignUpController::class, "store"]);

Route::get("/sign-in", [SignInController::class, "index"])->name("login")->middleware("guest");
Route::post("/sign-in", [SignInController::class, "authenticate"]);
Route::post("/sign-out", [SignInController::class, "signOut"])->middleware("auth");

Route::get('/collections/{collection:slug}', function (Collection $collection) {
    return view("collections.show", [
        "title" => "Collections",
        "collection" => $collection,
        "books" => $collection->books,
    ]);
});

Route::get('/genres/{genre:slug}', function (Genre $genre) {
    return view("genres.show", [
        "title" => "Genres",
        "genre" => $genre,
        "books" => $genre->books,
    ]);
});

Route::get('/publishers/{publisher:slug}', function (Publisher $publisher) {
    return view("publishers.show", [
        "title" => "Publishers",
        "publisher" => $publisher,
        "books" => $publisher->books,
    ]);
});

Route::get('/writers/{writer:slug}', function (Writer $writer) {
    return view("writers.show", [
        "title" => "Writer",
        "writer" => $writer,
        "books" => $writer->books,
    ]);
});

Route::get('/books/{book:slug}', function (Book $book) {
    return view("books.show", [
        "title" => "Book",
        "book" => $book,
    ]);
});

Route::get('/dashboard', function () {
    return view("dashboard.index", [
        "title" => "Dashboard",
        "users_count" => User::count(),
        "books_count" => Book::count(),
        "book_availability" => Book::sum("availability"),
        "books_quantity" => Book::sum("max_quantity"),
        "collections_count" => Collection::count(),
        "genres_count" => Genre::count(),
        "publishers_count" => Publisher::count(),
        "writers_count" => Writer::count(),
        "borrows_count" => BookUser::where("is_returned", false)->count(),
        "returns_count" => BookUser::where("is_returned", true)->count(),
    ]);
})->middleware([
    "auth",
    "is_admin",
]);

Route::resource('/dashboard/user', UserController::class)->middleware([
    "auth",
    "is_admin",
]);

Route::resource('/dashboard/book', BookController::class)->middleware([
    "auth",
    "is_admin",
]);

Route::resource('/dashboard/collection', CollectionController::class)->middleware([
    "auth",
    "is_admin",
]);

Route::resource('/dashboard/genre', GenreController::class)->middleware([
    "auth",
    "is_admin",
]);

Route::resource('/dashboard/publisher', PublisherController::class)->middleware([
    "auth",
    "is_admin",
]);

Route::resource('/dashboard/writer', WriterController::class)->middleware([
    "auth",
    "is_admin",
]);

Route::resource('/dashboard/borrow', BookUserController::class)->middleware([
    "auth",
    "is_admin",
]);

Route::get('/borrowed', function () {
    return view("dashboard.borrowed.index", [
        "title" => "Borrowed",
        "borroweds" => BookUser::
            where("user_id", Auth::user()->id)->
            where("is_returned", false)->
            orderBy("created_at")->
            get(),
    ]);
})->middleware([
    "auth",
    "is_not_admin",
]);

Route::get('/borrowed/{bookUser}', function (BookUser $bookUser) {
    return view("dashboard.borrowed.show", [
        "title" => "Show Borrowed Book",
        "borrowed_book" => $bookUser,
    ]);
})->middleware([
    "auth",
    "is_not_admin",
]);

Route::get('/returned', function () {
    return view("dashboard.returned.index", [
        "title" => "Returned",
        "returneds" => BookUser::
            where("user_id", Auth::user()->id)->
            where("is_returned", true)->
            orderBy("created_at")->
            get(),
    ]);
})->middleware([
    "auth",
    "is_not_admin",
]);

Route::get('/returned/{bookUser}', function (BookUser $bookUser) {
    return view("dashboard.returned.show", [
        "title" => "Show Returned Book",
        "returned_book" => $bookUser,
    ]);
})->middleware([
    "auth",
    "is_not_admin",
]);
<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Models\Collection;
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

Route::get("/sign-up", [SignUpController::class, "create"]);

Route::post("/sign-up", [SignUpController::class, "store"]);

Route::get("/sign-in", [SignInController::class, "index"]);

Route::get('/collections/{collection:slug}', function (Collection $collection) {
    return view("collections.show", ["title" => $collection->name, "collection" => $collection]);
});

Route::resource('/services/crud/collection', CollectionController::class);

Route::resource('/services/crud/book', BookController::class);
<?php

use App\Http\Controllers\CollectionController;
use App\Models\Collection;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('about', function () {
    return view('about', [
        "title" => "About",
    ]);
});

Route::get('collections/{collection:slug}', function (Collection $collection) {
    return view("collections.show", ["title" => $collection->name, "collection" => $collection]);
});

// return view("collections.show", ["title" => $collection->name, "collection" => $collection]);

Route::resource('services/crud/collection', CollectionController::class);
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class GenreController extends Controller
{
    public function index()
    {
        return view("dashboard.genre.index", [
            "title" => "Genre",
            "genres" => Genre::withCount("books")->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.genre.create', [
            "title" => "Create New Genre",
        ]);
    }

    public function store(StoreGenreRequest $request)
    {
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->slug = SlugService::createSlug(Genre::class, "slug", $request->name);
        $genre->save();

        return redirect('/dashboard/genre');
    }

    public function show(Genre $genre)
    {
        return view("dashboard.genre.show", [
            "title" => "Show Genre",
            "genre" => $genre,
        ]);
    }

    public function edit(Genre $genre)
    {
        return view('dashboard.genre.edit', [
            "title" => "Edit Genre",
            "genre" => $genre,
        ]);
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        if ($genre->name != $request->name) {
            $genre->slug = SlugService::createSlug(Genre::class, "slug", $request->name);
        }
        $genre->name = $request->name;

        $genre->save();
        return redirect('/dashboard/genre');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('/dashboard/genre');
    }
}
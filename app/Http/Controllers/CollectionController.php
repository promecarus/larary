<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\Collection;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CollectionController extends Controller
{
    public function index()
    {
        return view("dashboard.collection.index", [
            "title" => "Collection",
            "collections" => Collection::withCount("books")->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.collection.create', [
            "title" => "Create New Collection",
        ]);
    }

    public function store(StoreCollectionRequest $request)
    {
        $collection = new Collection;
        $collection->name = $request->name;
        $collection->slug = SlugService::createSlug(Collection::class, "slug", $request->name);
        $collection->save();

        return redirect('/dashboard/collection');
    }

    public function show(Collection $collection)
    {
        return view("dashboard.collection.show", [
            "title" => "Show Collection",
            "collection" => $collection,
        ]);
    }

    public function edit(Collection $collection)
    {
        return view('dashboard.collection.edit', [
            "title" => "Edit Collection",
            "collection" => $collection,
        ]);
    }

    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        if ($collection->name != $request->name) {
            $collection->slug = SlugService::createSlug(Collection::class, "slug", $request->name);
        }
        $collection->name = $request->name;

        $collection->save();
        return redirect('/dashboard/collection');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect('/dashboard/collection');
    }
}
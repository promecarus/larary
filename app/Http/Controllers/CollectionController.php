<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\Collection;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        return view("collection.index", [
            "title" => "Collection",
            "collections" => $collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collection.create', [
            "title" => "Create New Collection",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollectionRequest $request)
    {
        $collection = new Collection;
        $collection->name = $request->name;
        $collection->slug = SlugService::createSlug(Collection::class, "slug", $collection->name);
        $collection->save();
        // $request->slug = SlugService::createSlug(Collection::class, "slug", $request->name);
        // Collection::create($request);

        return redirect('services/crud/collection');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return view("collection.show", [
            "title" => "Show Collection",
            "collection" => $collection,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        return view('collection.edit', [
            "title" => "Edit Collection",
            "collection" => $collection,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollectionRequest  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $collection->name = $request->name;
        $collection->slug = Str::of($collection->name)->slug('-');

        $collection->save();
        return redirect('services/crud/collection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        // dd("destroy");
        $collection->delete();
        return redirect('services/crud/collection');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PublisherController extends Controller
{
    public function index()
    {
        return view("dashboard.publisher.index", [
            "title" => "Publisher",
            "publishers" => Publisher::withCount("books")->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.publisher.create', [
            "title" => "Create New Publisher",
        ]);
    }

    public function store(StorePublisherRequest $request)
    {
        $publisher = new Publisher;
        $publisher->name = $request->name;
        $publisher->slug = SlugService::createSlug(Publisher::class, "slug", $request->name);
        $publisher->save();

        return redirect('/dashboard/publisher');
    }

    public function show(Publisher $publisher)
    {
        return view("dashboard.publisher.show", [
            "title" => "Show Publisher",
            "publisher" => $publisher,
        ]);
    }

    public function edit(Publisher $publisher)
    {
        return view('dashboard.publisher.edit', [
            "title" => "Edit Publisher",
            "publisher" => $publisher,
        ]);
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        if ($publisher->name != $request->name) {
            $publisher->slug = SlugService::createSlug(Publisher::class, "slug", $request->name);
        }
        $publisher->name = $request->name;

        $publisher->save();
        return redirect('/dashboard/publisher');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect('/dashboard/publisher');
    }
}
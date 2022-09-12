<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriterRequest;
use App\Http\Requests\UpdateWriterRequest;
use App\Models\Writer;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class WriterController extends Controller
{
    public function index()
    {
        return view("dashboard.writer.index", [
            "title" => "Writer",
            "writers" => Writer::withCount("books")->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.writer.create', [
            "title" => "Create New Writer",
        ]);
    }

    public function store(StoreWriterRequest $request)
    {
        $writer = new Writer;
        $writer->name = $request->name;
        $writer->slug = SlugService::createSlug(Writer::class, "slug", $request->name);
        $writer->save();

        return redirect('/dashboard/writer');
    }

    public function show(Writer $writer)
    {
        return view("dashboard.writer.show", [
            "title" => "Show Writer",
            "writer" => $writer,
        ]);
    }

    public function edit(Writer $writer)
    {
        return view('dashboard.writer.edit', [
            "title" => "Edit Writer",
            "writer" => $writer,
        ]);
    }

    public function update(UpdateWriterRequest $request, Writer $writer)
    {
        if ($writer->name != $request->name) {
            $writer->slug = SlugService::createSlug(Writer::class, "slug", $request->name);
        }
        $writer->name = $request->name;

        $writer->save();
        return redirect('/dashboard/writer');
    }

    public function destroy(Writer $writer)
    {
        $writer->delete();
        return redirect('/dashboard/writer');
    }
}
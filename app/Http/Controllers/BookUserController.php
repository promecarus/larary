<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Http\Request;

class BookUserController extends Controller
{
    public function index()
    {
        return view("dashboard.borrow.index", [
            "title" => "Borrow",
            "borrowed_books" => BookUser::
                with(["user", "book"])->
                orderBy("is_returned")->
                orderBy("created_at")->
                get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.borrow.create', [
            "title" => "Add New Borrow",
            "books" => Book::whereNot("availability", 0)->get(),
            "borrowers" => User::where("is_admin", false)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $borrow = new BookUser;
        $borrow->book_id = $request->book_id;
        $borrow->user_id = $request->user_id;

        $borrow->book->availability -= 1;

        $borrow->book->save();
        $borrow->save();

        return redirect("dashboard/borrow");
    }

    public function show(BookUser $borrow)
    {
        return view("dashboard.borrow.show", [
            "title" => "Show Borrowed Book",
            "borrow" => $borrow,
        ]);
    }

    public function edit(BookUser $borrow)
    {
        //
    }

    public function update(Request $request, BookUser $borrow)
    {
        $borrow->is_returned = true;

        $borrow->book->availability += 1;

        $borrow->book->save();
        $borrow->save();
        return redirect('/dashboard/borrow');
    }

    public function destroy(BookUser $borrow)
    {
        //
    }
}
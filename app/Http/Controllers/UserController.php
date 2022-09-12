<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("dashboard.user.index", [
            "title" => "User",
            "users" => User::get(),
        ]);
    }

    public function show(User $user)
    {
        return view("dashboard.user.show", [
            "title" => "Show User",
            "user" => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            "title" => "Edit User",
            "user" => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->is_admin = $request->is_admin;
        $user->save();
        return redirect('/dashboard/user');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/dashboard/user');
    }
}
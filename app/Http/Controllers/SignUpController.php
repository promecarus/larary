<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SignUpController extends Controller
{
    public function create()
    {
        return view("sign-up.index", [
            "title" => "Sign Up",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => "required|unique:users|min:6|max:255",
            "email" => "required|unique:users|email:dns",
            "password" => "required|min:6",
        ]);

        $validatedData["email_verified_at"] = now();
        $validatedData["password"] = Hash::make($validatedData["password"]);
        $validatedData["remember_token"] = Str::random(10);

        User::create($validatedData);

        return redirect("/sign-in")->with("success", "Sign up success! Please sign in!");
    }
}
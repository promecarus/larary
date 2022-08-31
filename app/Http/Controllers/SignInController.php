<?php

namespace App\Http\Controllers;

class SignInController extends Controller
{
    public function index()
    {
        return view("sign-in.index", [
            "title" => "Sign In",
        ]);
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            "name" => "Muhammad Haikal Al Rasyid",
            "username" => "promecarus",
            "email" => "haikalslipi@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make("haikal"),
            "is_admin" => false,
            "remember_token" => Str::random(10),
        ]);

        User::factory()->create([
            "name" => "Rasyid",
            "username" => "chloracles",
            "email" => "eyegnieeslla2.0@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make("haikal"),
            "is_admin" => false,
            "remember_token" => Str::random(10),
        ]);

        User::factory()->create([
            "name" => "Admin",
            "username" => "admin",
            "email" => "admin@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make("admin"),
            "is_admin" => true,
            "remember_token" => Str::random(10),
        ]);

        User::factory(2)->create();

        Collection::factory(10)->create();

        Genre::factory(10)->create();

        Publisher::factory(10)->create();

        Writer::factory(10)->create();

        Book::factory(1000)->create();

        BookGenre::factory(1000)->create();
        // BookGenre::factory(1000)->create();
    }
}
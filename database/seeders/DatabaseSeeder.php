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

        Writer::factory()->create([
            "name" => "Tere Liye",
            "slug" => "tere-liye",
        ]);

        Writer::factory()->create([
            "name" => "Ahmad",
            "slug" => "ahmad",
        ]);

        Book::factory()->create([
            "name" => "Judul Buku 1",
            "slug" => "judul-buku-1",
            "cover" => null,
            "publication_date" => "2022-01-02",
            "total_pages" => 20,
            "isbn" => "123-123-1234-12-1",
            "description" => "Sebuah buku pertama",
            "max_quantity" => 100,
            "availability" => 100,

            "writer_id" => 1,
            "publisher_id" => 1,
            "collection_id" => 1,
            "genre_id" => 1,
        ]);

        Book::factory()->create([
            "name" => "Judul Buku 2",
            "slug" => "judul-buku-2",
            "cover" => null,
            "publication_date" => "2022-02-03",
            "total_pages" => 20,
            "isbn" => "123-123-1234-12-2",
            "description" => "Sebuah buku kedua",
            "max_quantity" => 100,
            "availability" => 100,

            "writer_id" => 2,
            "publisher_id" => 2,
            "collection_id" => 1,
            "genre_id" => 2,
        ]);

        Book::factory()->create([
            "name" => "Judul Buku 3",
            "slug" => "judul-buku-3",
            "cover" => null,
            "publication_date" => "2022-03-04",
            "total_pages" => 20,
            "isbn" => "123-123-1234-12-3",
            "description" => "Sebuah buku ketiga",
            "max_quantity" => 100,
            "availability" => 100,

            "writer_id" => 2,
            "publisher_id" => 2,
            "collection_id" => 2,
            "genre_id" => 2,
        ]);

        BookGenre::factory()->create([
            "book_id" => 1,
            "genre_id" => 1,
        ]);

        BookGenre::factory()->create([
            "book_id" => 1,
            "genre_id" => 2,
        ]);
    }
}
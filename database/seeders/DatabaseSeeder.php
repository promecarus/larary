<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)->create();

        Collection::factory()->create(
            ['name' => 'General Works', 'slug' => 'general-works']
        );

        Collection::factory()->create(
            ['name' => 'Philosophy', 'slug' => 'philosophy']
        );

        Collection::factory()->create(
            ['name' => 'Religion', 'slug' => 'religion']
        );

        Collection::factory()->create(
            ['name' => 'Social Sciences', 'slug' => 'social-sciences']
        );

        Collection::factory()->create(
            ['name' => 'Language', 'slug' => 'language']
        );

        Collection::factory()->create(
            ['name' => 'Science', 'slug' => 'science']
        );

        Collection::factory()->create(
            ['name' => 'Technology', 'slug' => 'technology']
        );

        Collection::factory()->create(
            ['name' => 'The Arts', 'slug' => 'the-arts']
        );

        Collection::factory()->create(
            ['name' => 'Literature', 'slug' => 'literature']
        );

        Collection::factory()->create(
            ['name' => 'History, Geography', 'slug' => 'history-geography']
        );
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(),
            'slug' => fake()->word(),
            'cover' => fake()->image(null, 640, 480),
            'publication_year' => fake()->year(),
            'total_pages' => fake()->randomNumber(5, false),
            'isbn' => fake()->randomNumber(13, true),
            'description' => fake()->text(100),
            'max_quantity' => fake()->randomNumber(5, true),
            'availability' => fake()->randomNumber(4, true),
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model"s default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->words(),
            // "slug" => fake()->words(),
            // "cover" => fake()->words(),
            // "publication_year" => fake()->year(),
            // "total_pages" => [100],
            // "isbn" => [fake()->numerify("###-###-####-##-#")],
            // "description" => [fake()->text(100)],
            // "max_quantity" => [fake()->randomNumber(5, true)],
            // "availability" => [fake()->randomNumber(4, true)],
        ];
    }
}
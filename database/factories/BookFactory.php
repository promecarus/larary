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
        $max = fake()->numberBetween(10, 100);
        return [
            "name" => ucwords(fake()->unique()->words(fake()->numberBetween(2, 5), true)),
            // "cover" => fake()->words(),
            "publication_date" => fake()->dateTime(),
            "total_pages" => fake()->numberBetween(100, 200),
            "isbn" => fake()->numerify("###-#-##-######-#"),
            "description" => fake()->sentence(fake()->numberBetween(100, 200)),
            "max_quantity" => $max,
            "availability" => $max,

            "collection_id" => fake()->numberBetween(1, 10),
            "publisher_id" => fake()->numberBetween(1, 10),
            "writer_id" => fake()->numberBetween(1, 10),
        ];
    }
}
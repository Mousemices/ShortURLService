<?php

namespace Database\Factories;

use App\Models\ShortURL;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShortURL>
 */
class ShortURLFactory extends Factory
{
    protected $model = ShortURL::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination_url' => fake()->unique()->url(),
            // TODO: Implement an algorithm that generate unique short_code
            'short_code' => fake()->unique()->firstName(),
        ];
    }
}

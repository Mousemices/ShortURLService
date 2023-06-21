<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShortURLDetail>
 */
class ShortURLDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'device' => fake()->boolean() ? fake()->userAgent() : null,
            'ip_address' => fake()->boolean() ? fake()->ipv4() : null,
            'operating_system' => $this->randomOS(),
            'visited_at' => $this->randomVisitedAt(),
        ];
    }

    private function randomOS(): string
    {
        $OS = ['Linux', 'Windows', 'Mac'];

        $index = array_rand($OS);

        return $OS[$index];
    }

    private function randomVisitedAt()
    {
        $isPast = fake()->boolean(49);
        $days = fake()->numberBetween(1, 100);
        $hours = fake()->numberBetween(1, 24);
        $minutes = fake()->numberBetween(1, 100);
        $seconds = fake()->numberBetween(1, 200);

        if ($isPast) {
            return now()->subDays($days)->subHours($hours)->subMinutes($minutes)->subSeconds($seconds);
        }

        return now()->subHours($hours)->subMinutes($minutes)->subSeconds($seconds);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ShortURL;
use App\Models\ShortURLDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()
            ->count(10)
            ->has(
                ShortURL::factory()
                    ->has(
                        ShortURLDetail::factory()
                            ->count(25)
                    )
                    ->count(5)
                    ->state(function (array $attributes, User $user) {
                        return ['user_id' => $user->id];
                    }),
                'shortenedUrls'
            )
            ->create();
    }
}

<?php

namespace Http\Controllers;

use App\Models\ShortURL;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->createShortURLFor($user);
    }

    public function test_it_redirect_to_destination_url(): void
    {
        $this->get('/s/' . 'baidu')
            ->assertRedirect();
    }

    private function createShortURLFor($user)
    {
        $user->shortenedUrls()->create([
            'destination_url' => 'http://baidu.com',
            'short_code' => 'baidu'
        ]);
    }
}

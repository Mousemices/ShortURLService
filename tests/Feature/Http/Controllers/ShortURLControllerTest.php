<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShortURLControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }

    public function test_displays_create_short_url_page(): void
    {
        $response = $this->get(route('short-url.create'));

        $response->assertStatus(200)
            ->assertSessionHasNoErrors();
    }

    public function test_shortURL_can_be_created(): void
    {
        $this->post(route('short-url.generate'), [
            'destination_url' => 'www.baidu.com',
            'short_code' => null
        ]);

        $this->assertDatabaseCount('short_urls', 1);
    }

    public function test_shortURL_can_be_created_with_custom_short_code(): void
    {
        $shortCode = 'baidu';

        $this->post(route('short-url.generate'), [
            'destination_url' => 'www.baidu.com',
            'short_code' => $shortCode
        ]);

        $this->assertDatabaseHas('short_urls', [
            'short_code' => $shortCode
        ]);
    }
}

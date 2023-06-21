<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShortURLControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }

    public function test_returns_list_of_short_url(): void
    {
        $response = $this->get(route('short-url.index'));

        $response->assertStatus(200)
            ->assertSessionHasNoErrors();
    }

    public function test_shortURL_can_be_created(): void
    {
        $this->post(route('short-url.generate'), [
            'destination_url' => 'www.baidu.com',
        ]);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * Create a post with an authenticated user
     *
     * @return void
     */
    public function testCreatePostWithAuthenticatedUser()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->post('/posts', ['content' => 'It\'s a test']);

        $response->assertStatus(200);

        $response = $this->actingAs($user)
                         ->post('/posts');

        $response->assertStatus(302);
    }

        /**
     * Create a post without an authenticated user
     *
     * @return void
     */
    public function testCreatePostWithoutAuthenticatedUser()
    {
        $user = factory(User::class)->create();

        $response = $this->postJson('/posts', ['content' => 'It\'s a test']);

        $response->assertStatus(401);

        $response = $this->postJson('/posts');

        $response->assertStatus(401);
    }
}

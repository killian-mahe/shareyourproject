<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->post('/posts', ['content' => 'It\'s a test', 'project' => 1]);

        $response->assertStatus(200);

        $response = $this->actingAs($user)
                         ->post('/posts');

        $response->assertStatus(302);
    }
}

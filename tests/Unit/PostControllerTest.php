<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\User;

class PostControllerTest extends TestCase
{
    /**
     * A basic test for index post route
     *
     * @return void
     */
    public function testListPost()
    {
        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);
        $response->assertViewIs('post.list');
    }

    /**
     * A test for displaying the post create form
     *
     * @return void
     */
    public function testCreatePostForm()
    {
        $response = $this->get(route('posts.create'));

        $response->assertRedirect(route('login'));

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('posts.create'));
        $response->assertStatus(200);
        $response->assertViewIs('post.create');
    }

    /**
     * A test for displaying the edit form
     *
     * @return void
     */
    public function testEditPostForm()
    {
        $user = User::factory()->create();
        $post = \App\Models\Post::factory()->make();
        $post->author()->associate($user);
        $post->push();

        $response = $this->get(route('posts.edit', ['post' => $post->id]));
        $response->assertRedirect(route('login'));

        $response = $this->actingAs($user)->get(route('posts.edit', ['post' => $post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('post.edit');
    }

    /**
     * A test for displaying a post
     *
     * @return void
     */
    public function testShowPost()
    {
        $post = \App\Models\Post::factory()->with_author()->create();

        $response = $this->get(route('posts.show', ['post' => $post->id]));

        $response->assertStatus(200);
        $response->assertViewIs('post.post');
    }
}

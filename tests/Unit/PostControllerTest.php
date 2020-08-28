<?php

namespace Tests\Unit;

use Tests\TestCase;

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

        $user = factory(\App\User::class)->create();

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
        $user = factory(\App\User::class)->create();
        $post = factory(\App\Models\Post::class)->make();
        $post->author()->associate($user);
        $post->push();

        $response = $this->get(route('posts.edit', ['post' => $post->id]));
        $response->assertRedirect(route('login'));

        $response = $this->actingAs($user)->get(route('posts.edit', ['post' => $post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('post.edit');
    }
}

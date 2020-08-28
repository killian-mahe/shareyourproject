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

        $user = factory(\App\User::class, 1)->create();

        $response = $this->actingAs($user)->get(route('posts.create'));
        $response->assertStatus(200);
        $response->assertViewIs('posts.create');
    }

    /**
     * A test for displaying the edit form
     *
     * @return void
     */
    public function testEditPostForm()
    {
        $user = factory(\App\User::class, 1)->create();
        $post = factory(\App\Models\Post::class, 1)->make();
        $post->author()->save($user);
        $post->push();

        $reponse = $this->get(route('posts.edit', ['post' => $post->id]));
        $response->assertRedirect(route('login'));

        $reponse = $this->actingAs($user)->get(route('posts.edit', ['post' => $post->id]));
        $response->assertStatus(200);
        $response->assertViewIs('posts.edit');
    }
}

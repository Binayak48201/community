<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavouritePostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_authenticated_user_can_favourite_a_specific_post()
    {
        $user = User::factory()->create();
        $this->be($user);

        $post = Post::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'Hey Title',
            'body' => 'Hey Body',
        ]);

        $this->post('/posts/' . $post->id . '/favourites');

        $this->assertDatabaseHas('posts', $post->toArray());
    }

    /** @test */
    public function an_unauthenticated_user_cannot_favourite_post()
    {
        $post = Post::factory()->create();
        $this->post('/posts' . $post->id . '/favourites');
        // $this->get('/posts');
        $this->assertGuest();
    }

    /** @test */
    public function an_authenticated_user_can_see_the_post()
    {
        $post = Post::factory()->create();
        $this->get('/posts' . $post->id);
        $this->assertGuest();
    }
}

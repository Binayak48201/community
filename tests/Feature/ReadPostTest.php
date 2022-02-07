<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ReadPostTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_user_can_view_all_posts()
    {
        $posts = Post::factory()->create();

        $response = $this->get('/posts');

        $response->assertSee($posts->title);
    }

    /** @test */
    public function a_user_can_read_a_single_post()
    {
        $this->withoutExceptionHandling();

        $posts = Post::factory()->create();

        $response = $this->get('/posts/' . $posts->id);

        $response->assertSee($posts->title);
    }

    /** @test */
    public function a_user_can_read_replies_which_are_associated_with_a_post()
    {
        $posts = Post::factory()->create();

        $reply = Reply::factory()->create(['post_id' => $posts->id]);

        $response = $this->get('/posts/' . $posts->id);

        $response->assertSee($reply->body);
    }

    
}

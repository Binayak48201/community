<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadPostTest extends TestCase
{
    use RefreshDatabase;

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

        $category = Category::factory()->create();

        $posts = Post::factory()->create(['category_id' => $category->id]);

        $response = $this->get($posts->path());

        $response->assertSee($posts->title);
    }

    /** @test */
    public function a_user_can_read_replies_which_are_associated_with_a_post()
    {
        $category = Category::factory()->create();

        $posts = Post::factory()->create(['category_id' => $category->id]);

        $reply = Reply::factory()->create(['post_id' => $posts->id]);

        $response = $this->get($posts->path());

        $response->assertSee($reply->body);
    }

    /** @test */
    public function an_anonomous_user_can_filter_posts_according_to_category()
    {
        $category = Category::factory()->create();

        $postsInCategory = Post::factory()->create(['category_id' => $category->id]);

        $postsNotInCategory = Post::factory()->create();

        $this->get('/posts/' . $category->slug)
            ->assertSee($postsInCategory->title)
            ->assertDontSee($postsNotInCategory->title);

    }
}

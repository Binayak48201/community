<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
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
    public function a_guest_user_can_read_a_single_post()
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();

        $posts = Post::factory()->create(['category_id' => $category->id]);

        $response = $this->get($posts->path);

        $response->assertSee($posts->title);
    }

    /** @test */
    public function a_user_can_read_replies_which_are_associated_with_a_post()
    {
        $category = Category::factory()->create();

        $posts = Post::factory()->create(['category_id' => $category->id]);

        $reply = Reply::factory()->create(['post_id' => $posts->id, 'body' => 'here is the body']);

        $response = $this->get($posts->path);
        // Cliff hanger
        $response->assertStatus(200);
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

    /** @test */
    public function a_user_filters_posts_by_any_username()
    {
        $user = User::factory()->create(['name' => 'RamShrestha']);

        $post1 = Post::factory()->create(['user_id' => $user->id]);
        $post2 = Post::factory()->create();

        $this->get('/posts?by=RamShrestha')
            ->assertSee($post1->title)
            ->assertDontSee($post2->title);
    }

    /** @test */
    public function a_user_can_filter_a_posts_which_are_unanswered()
    {
        $posts1 = Post::factory()->create();

        $posts2 = Post::factory()->create();

        Reply::factory(2)->create(['post_id' => $posts1->id]);

        $response = $this->get('/posts?unanswered=1');

        $response->assertSee($posts2->title);
    }
}

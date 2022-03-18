<?php

namespace Tests\Feature;

use App\Models\Ability;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Role;
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
        $this->withoutExceptionHandling();
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

        $posts3 = Post::factory()->create();

        Reply::factory(2)->create(['post_id' => $posts2->id]);

        Reply::factory(3)->create(['post_id' => $posts3->id]);

        $posts = Post::all();

        $response = $this->get('/posts?unanswered=1');

        $this->assertEquals($posts1->title, $posts[0]->title);
        $this->assertEquals($posts2->title, $posts[1]->title);
        $this->assertEquals($posts3->title, $posts[2]->title);
    }

    /** @test */
    public function a_user_can_view_a_secret_report()
    {
        $this->get('/secret-report')->assertStatus(403);

        $this->authorizedUser('Admin', 'view_report');

        $this->get('/secret-report')->assertStatus(200);
    }

    /** @test */
    public function a_post_can_be_searched()
    {
        $this->withoutExceptionHandling();

        $posts1 = Post::factory()->create(['title' => 'search']);

        $posts2 = Post::factory()->create(['title' => 'out of this world']);

        $response = $this->get('/posts?search=search');

        $response->assertSee($posts1->title);

        $response->assertDontSee($posts2->title);
    }
}

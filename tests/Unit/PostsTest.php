<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_author()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->user);
    }

    /** @test */
    public function it_has_many_many_reply()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $post->reply);
    }

    /** @test */
    public function it_belongs_to_a_category()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(Category::class, $post->category);
    }

    /** @test */
    public function it_has_a_path()
    {
        $post = Post::factory()->create();

        $this->assertEquals("/posts/{$post->category->slug}/{$post->slug}", $post->path);
    }

    /** @test */
    public function a_post_can_be_subscribed()
    {
        // Posts
        $post = Post::factory()->create();

        // Authenticated User
        $this->be(User::factory()->create());

        $post->subscribe();

        $this->assertEquals(1, $post->subscriptions()->where('user_id', auth()->id())->count());
    }

    /** @test */
    public function a_post_can_be_unsubscribed()
    {
        // Posts
        $post = Post::factory()->create();

        // Authenticated User
        $this->be(User::factory()->create());

        $post->subscribe();

        $this->assertEquals(1, $post->subscriptions()->where('user_id', auth()->id())->count());

        $post->unsubscribe();

        $this->assertEquals(0, $post->subscriptions()->where('user_id', auth()->id())->count());
    }
}

<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

//    /** @test */
//    public function a_user_has_many_posts()
//    {
//        $this->withoutExceptionHandling();
//
//        $user = User::factory()->create();
//
//        $this->assertInstanceOf(Post::class, $user->post);
//    }

    /** @test */
    public function it_has_a_author()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->user);
    }
}

<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase;

class PostsTest extends TestCase
{

    /** @test */
    public function it_has_a_author()
    {
        $post = Post::factory()->create();

        $this->assertInstanceOf(User::class, $post->user);
    }
}

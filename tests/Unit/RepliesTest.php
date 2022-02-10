<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RepliesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_reply()
    {
        $post = Post::factory()->create();

//        $this->assertCount(0, $post->reply);

        $post->addReply('test');

        $this->assertCount(1, $post->reply);
    }
}

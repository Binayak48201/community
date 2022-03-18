<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RepliesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_reply()
    {
        $this->be(User::factory()->create());

        $post = Post::factory()->create();

        $post->addReply('test');

        $this->assertCount(1, $post->fresh()->reply);

        $this->assertEquals(1, $post->fresh()->reply_count);
    }
}

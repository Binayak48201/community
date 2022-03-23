<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MentionUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function mentioned_uses_in_comment_are_notified()
    {
        // We have a user who is signin.
        $kushal = $this->signIn();

        // Another user
        $bishwonath = User::factory()->create(['name' => 'bishwonath']);

        // We have a post
        $post = Post::factory()->create();

        // When a signed user replies to the post ani mention @bishwonath
        $this->post($post->path . '/reply', [
            'body' => 'Hellow @bishwonath !!. How are you.'
        ]);

        // bishwonath lai chai aaba notiification jano paro.

        $this->assertCount(1, $bishwonath->notification);
    }
}

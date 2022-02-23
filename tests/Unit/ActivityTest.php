<?php

namespace Tests\Unit;

use App\Models\Activities;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_record_activity_when_a_post_is_created()
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->create();

        $this->assertDatabaseHas('activities', [
            'subject_id' => $post->id,
            'subject_type' => 'App\Models\Post',
            'user_id' => $user->id,
            'type' => 'created_post'
        ]);

        $activity = Activities::first();

        $this->assertEquals($activity->subject->id, $post->id);
    }

    /** @test */
    public function it_can_record_activity_when_a_reply_is_created()
    {
        $user = User::factory()->create();

        $this->be($user);

        Reply::factory()->create();

        $this->assertEquals(2, Activities::count());

    }
}

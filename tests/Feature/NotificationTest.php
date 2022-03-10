<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_notification_is_prepared_when_a_subscribed_post_receives_a_new_reply_which_is_not_created_by_the_post_user()
    {
        $this->be(User::factory()->create());

        $post = Post::factory()->create(['user_id' => auth()->id()]);

        $post2 = Post::factory()->create();

        $this->post($post->path . '/subscribe');

        $post->addReply('somebody');

        $this->assertCount(0, auth()->user()->notifications);

        $this->post($post2->path . '/subscribe');

        //When a new reply is created
        $post2->addReply('somebody');

        // It should trigger a notification
        $this->assertCount(1, auth()->user()->fresh()->notifications);
    }

    /** @test */
    public function a_user_fetch_their_unread_notification()
    {
        $this->be(User::factory()->create());

        $post = Post::factory()->create();

        $this->post($post->path . '/subscribe');

        //When a new reply is created
        $post->addReply('somebody');

        $this->assertCount(1, $this->getJson('/profile/' . auth()->id() . '/notification')->json());

    }

    /** @test */
    public function a_user_mark_a_notification_as_read()
    {

        $this->be(User::factory()->create());

        $post = Post::factory()->create();

        $this->post($post->path . '/subscribe');

        //When a new reply is created
        $post->addReply('somebody');

        $this->assertCount(1, auth()->user()->notifications);

        $this->delete('/profile/' . auth()->id() . '/notification/' . auth()->user()->notifications[0]->id);

        $this->assertCount(0, auth()->user()->fresh()->unreadNotifications);
    }
}

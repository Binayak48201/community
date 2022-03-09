<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscribeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_user_may_not_subscribbe_to_any_post()
    {

        $post = Post::factory()->create();

        $this->post($post->path . '/subscribe')->assertRedirect('/login');
        $this->delete($post->path . '/unsubscribe')->assertRedirect('/login');
    }

    /** @test */
    public function an_auth_user_can_subscribe_to_a_post()
    {
        $post = Post::factory()->create();

        $this->be(User::factory()->create());

        $this->post($post->path . '/subscribe');

        $this->assertDatabaseHas('post_subscriptions', [
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);


    }

    /** @test */
    public function an_auth_user_can_unsubscribe_to_a_post()
    {
        $post = Post::factory()->create();

        $this->be(User::factory()->create());

        $this->post($post->path . '/subscribe');

        $this->assertCount(1, $post->fresh()->subscriptions);

        $this->delete($post->path . '/unsubscribe');

        $this->assertCount(0, $post->fresh()->subscriptions);
    }

}

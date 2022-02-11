<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FavouriteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_may_not_favourite_any_reply()
    {
        $this->post('/replies/1/favorites')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_favorite_any_reply()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->be($user);

        $reply = Reply::factory()->create();

        $this->post('/replies/' . $reply->id . '/favorites');

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_may_not_favorite_any_reply_twice()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->be($user);

        $reply = Reply::factory()->create();

        try {

            $this->post('/replies/' . $reply->id . '/favorites');
            $this->post('/replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            die('You cannot favourite twice.');
        }

        $this->assertCount(1, $reply->favorites);
    }
}

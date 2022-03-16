<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MentionsUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @ test */
    public function an_authenticated_user_can_mention_another_authenticated_user()
    {
        $user1 = User::factory()->create();

        $user2 = User::factory()->create();




        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

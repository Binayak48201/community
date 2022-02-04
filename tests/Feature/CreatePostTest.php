<?php


namespace Tests\Feature;


use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_guest_may_not_create_post()
    {
        $posts = Post::factory()->make();

        $this->post('/posts', $posts->toArray())->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_use_can_create_a_post()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->be($user);

        $attribute = [
            'user_id' => $user->id,
            'title' => 'Some Title',
            'body' => 'Some Description'
        ];

        $this->post('/posts', $attribute);

        $this->assertDatabaseHas('posts', $attribute);
    }

}

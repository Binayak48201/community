<?php


namespace Tests\Feature;


use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_guest_may_not_create_post()
    {
        $posts = Post::factory()->make();

        $this->post('/posts', $posts->toArray())->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_use_can_create_a_post()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $attribute = [
            'user_id' => $user->id,
            'title' => 'Some Title',
            'body' => 'Some Description'
        ];

        $response = $this->post('/posts', $attribute);

        $response->assertRedirect('/posts');

        $this->assertDatabaseHas('posts', $attribute);
    }

    /** @test */
    public function user_can_visit_dashboard_when_login()
    {
        $user = User::factory()->create();

        $this->be($user);

        $attributes = Post::factory()->raw(['title' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_body()
    {
        $user = User::factory()->create();

        $this->be($user);

        $attributes = Post::factory()->raw(['body' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_post_requires_a_valid_category()
    {
        $user = User::factory()->create();

        $this->be($user);

        $post1 = Post::factory()->raw(['category_id' => '']);

        $post2 = Post::factory()->raw(['category_id' => 999]);

        $this->post('/posts', $post1)->assertSessionHasErrors('category_id');

        $this->post('/posts', $post2)->assertSessionHasErrors('category_id');
    }

    /** @test */
    public function a_post_requires_a_unique_slug()
    {
        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->create(['title' => 'Some title']);

        $this->assertEquals($post->slug, 'some-title');
    }

    /** @test */
    public function a_post_with_a_title_that_ends_in_a_number_should_generate_the_proper_slug()
    {
        $user = User::factory()->create();

        $this->be($user);

        Post::factory()->create(['title' => 'Some title 29']);

        $post = Post::factory()->create(['title' => 'Some title 29']);

        $this->post('/posts', $post->toArray());

        $this->assertEquals("some-title-29-{$post['id']}", $post['slug']);
    }

    /** @test */
    public function a_post_can_be_updated()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->create(['title' => 'Some title']);

        $this->patch($post->path(), [
            'title' => 'Updated Title'
        ]);
//        dd($post->fresh());
        $this->assertEquals("Updated Title", $post->fresh()->title);
        $this->assertDatabaseHas('posts', [
            'title' => $post->fresh()->title
        ]);
    }

    /** @test */
    public function a_post_can_be_deleted()
    {
        // $this->withExceptionHandling();

        $user = User::factory()->create();

        $this->be($user);

        $post = Post::factory()->create();

        $this->delete($post->path());

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}

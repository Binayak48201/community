<?php


namespace Tests\Feature;


use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_may_not_create_post()
    {
        $project = Post::factory()->create();

        $this->post('/posts', $project->toArray())->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_use_can_create_a_post()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $category = Category::factory()->create();

        $attribute = [
            'user_id' => auth()->id(),
            'category_id' => $category->id,
            'title' => 'Some Title',
            'body' => 'Some Description'
        ];

        $response = $this->post('/posts', $attribute);

//        $response->assertRedirect('/posts');

        $this->assertDatabaseHas('posts', $attribute);
    }

    /** @test */
    public function a_posts_requires_a_title()
    {
        $user = $this->signIn();

        $attributes = Post::factory()->raw(['title' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_posts_requires_a_body()
    {
        $this->signIn();

        $attributes = Post::factory()->raw(['body' => '']);

        $this->post('/posts', $attributes)->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_post_requires_a_valid_category()
    {
        $this->signIn();

        $post1 = Post::factory()->raw(['category_id' => '']);

        $post2 = Post::factory()->raw(['category_id' => 999]);

        $this->post('/posts', $post1)->assertSessionHasErrors('category_id');

        $this->post('/posts', $post2)->assertSessionHasErrors('category_id');
    }

    /** @test */
    public function a_post_requires_a_unique_slug()
    {
        $this->signIn();

        $post = Post::factory()->create(['title' => 'Some title']);

        $this->assertEquals($post->slug, 'some-title');
    }

    /** @test */
    public function a_post_with_a_title_that_ends_in_a_number_should_generate_the_proper_slug()
    {
        $this->signIn();

        Post::factory()->create(['title' => 'Some title 29']);

        $post = Post::factory()->create(['title' => 'Some title 29']);

        $this->post('/posts', $post->toArray());

        $this->assertEquals("some-title-29-{$post['id']}", $post['slug']);
    }

    /** @test */
    public function a_post_can_be_updated()
    {

        /*$this->withoutExceptionHandling();*/
        $this->signIn();

        $post = Post::factory()->create([
            'title' => 'Some title',
           ]);

        $this->patch($post->path, [
            'title' => 'Updated Title',
        ]);

       /*dd($post->fresh());*/

        $this->assertEquals("Updated Title", $post->fresh()->title);
        $this->assertDatabaseHas('posts', [
            'title' => $post->fresh()->title,

        ]);
    }

    /** @test */
    public function a_get_user_may_not_delete_post()
    {
        $this->withExceptionHandling();

        $post = Post::factory()->create();

        $this->delete($post->path)->assertRedirect('/login');
    }

    /** @test */
    public function a_unauthorized_user_may_not_delete_post()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $post = Post::factory()->create();

        $this->delete($post->path)->assertStatus(403);
    }

    /** @test */
    public function an_authorized_user_only_can_delete_there_post()
    {
        $this->signIn();

        $post = Post::factory()->create(['user_id' => auth()->id()]);

        $this->delete($post->path);

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    /** @test */
    public function an_un_authorized_user_may_not_delete_reply()
    {
        $reply = Reply::factory()->create();

        $this->delete('/replies' . '/' . $reply->id)
            ->assertRedirect('/login');

        $this->signIn();

        $this->delete('/replies' . '/' . $reply->id)
            ->assertStatus(403);

    }

    /** @test */
    public function only_authorized_user_can_delete_their_reply()
    {
        $this->signIn();

        $post = Post::factory()->create();

        $reply = Reply::factory()->create(['user_id' => auth()->id(), 'post_id' => $post->id]);

        $this->assertEquals(1, $post->fresh()->reply_count);

        $this->delete('/replies' . '/' . $reply->id);

        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);

        $this->assertEquals(0, $post->fresh()->reply_count);
    }

    /** @test */
    public function users_may_only_reply_a_maximum_of_per_minute()
    {
        $this->signIn();

        $post = Post::factory()->create();

        $reply = Reply::factory()->make(['created_at' => now()]);

        $this->post($post->path . '/reply', $reply->toArray())->assertStatus(200);

        $this->post($post->path . '/reply', $reply->toArray())->assertStatus(422);
    }
}


<?php


namespace Tests\Feature;


use App\Models\Category;
use App\Models\Post;
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

//        $this->get('/posts/create')->assertRedirect('login');
//        $this->get($project->path() . '/edit')->assertRedirect('login');
//        $this->get($project->path())->assertRedirect('login');
        $this->post('/posts', $project->toArray())->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_use_can_create_a_post()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        $this->be($user);

        $attribute = [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'title' => 'Some Title',
            'body' => 'Some Description'
        ];

        $this->post('/posts', $attribute);

        $this->assertDatabaseHas('posts', $attribute);
    }

    /** @test */
    public function a_posts_requires_a_title()
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
}


<?php

namespace Tests\Feature;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_category()
    {
        $user = User::factory()->create();
        $this->be($user);

        // $category = Category::factory()->create();
        $category = [
            'title' => 'New Category',
            'slug' => 'new-category',
        ];
        $response = $this->post('/category', $category);
        $response->assertRedirect('/category');
        // $this->assertSee('categories', $category);
    }

    /** @test */
    public function update_category()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->be($user);

        $category = Category::factory()->create();
        // $post = Post::factory()->create();

        $category->patch($post->path(), []);
        $category->update([
            'title' => 'Title',
            'slug' => 'Slug',
        ]);
        // dd($category->fresh());
        // $response = $this->post('/category', $category->toArray());
        // $response->assertSee($category->title);
        $this->assertEquals("Updated Data", $category->fresh()->title);
    }

    /** @test */
    public function delete_category()
    {
        $user = User::factory()->create();
        $this->be($user);

        $category = Category::factory()->create();
        $category->delete(['id' => $category->id]);
        $response = $this->post('/category', $category->toArray());
        // dd($response);
        // dd($);
        $response->assertSee($category->id);
    }
}

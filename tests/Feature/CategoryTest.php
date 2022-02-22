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
        // $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->be($user);

        // $category = Category::factory()->create();
        $category = [
            'title' => 'New Category',
            'slug' => 'new-category',
        ];
        $response = $this->post('/category', $category);
        $response->assertSee($category);
        // $response->assertRedirect('/category');
    }

    /** @test */
    public function update_category()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->be($user);
        $category = Category::factory()->create(['title' => 'Some Category']);
        // $post = Post::factory()->create();
        $this->patch($category->id, [
            'title' => 'Updated Data',
        ]);
        // dd($category);
        $this->assertEquals("Updated Data", $category->fresh()->title);
        // $this->assertDatabaseHas('categories', [
        //     'title' => $category->fresh()->title
        // ]);
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

<?php

namespace Tests\Feature;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
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
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    // public function admin_can_create_category()
    // {
    //     $this->withoutExceptionHandling();
    //     $user = User::factory()->create();
    //     $this->actingAs($user->role);
    //     $category = Category::factory()->create();

    //     if ($this->actingAs($user) == 'admin') {
    //         $cat_create= $category;
    //         $response = $this->get('/posts/category', $category->toArray());
    //         $response->assertSee($cat_create->title);
    //     } 

    //     $response = $this->get('/category', $category->toArray());
    //     $response->assertSee($category->title);

    //     // else {
    //     //     $response = $this->get('/', [$user->name]);
    //     //     $response->assertSee($user->name);
    //     //     return 'Please login as admin';
    //     // }
    // }

    /** @test */
    public function create_category()
    {
        $user = User::factory()->create();
        $this->be($user);

        $category = Category::factory()->create();
        $this->post('/category', $category->toArray())
            ->assertSee($category->id);
    }

    /** @test */
    public function update_category()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->be($user);
        $category = Category::factory()->create();
        // dump($category);
        $category->update([
            'title' => 'Title',
            'slug' => 'Slug',
        ]);
        // dd($category->fresh());
        // $response = $this->post('/category', $category->toArray());
        // $response->assertSee($category->title);
        $this->assertEquals("Updated Data" ,$category->fresh()->title);
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

    // /** @test */
    // public function admin_can_delete_category($id)
    // {
    //     $user = User::factory()->create();
    //     $this->be($user);

    //     if ($this->actingAs($user) == 'admin') {
    //         return 'Cannot Delete';
    //     } else {
    //         $category = Category::findOrFail($id);
    //         $category->delete();
    //         $response = $this->get('/category', [$category->slug]);
    //         $response->assertSee($category->slug);
    //     }
    // }
}

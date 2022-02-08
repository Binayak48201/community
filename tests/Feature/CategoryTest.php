<?php

namespace Tests\Feature;

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
    public function admin_can_create_category()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        if ($this->actingAs($user) == 'admin') {
            $category = Category::factory()->create();
            $response = $this->get('/category', $category->id);
            $response->assertSee($category->title);
        } else {
            $response = $this->get('/', [$user->name]);
            $response->assertSee($user->name);
            return 'Please login as admin';
        }
    }

    /** @test */
    public function admin_can_delete_category($id)
    {
        $user = User::factory()->create();
        $this->be($user);

        if ($this->actingAs($user) == 'admin') {
            return 'Cannot Delete';
        } else {
            $category = Category::findOrFail($id);
            $category->delete();
            $response = $this->get('/category', [$category->slug]);
            $response->assertSee($category->slug);
        }
    }
}

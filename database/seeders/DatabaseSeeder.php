<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Post::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@email.com',
            'password' => bcrypt('password')
        ]);

        Post::factory(10)->create()->each(function($post){
            Category::factory(5)->create();
        });
    }
}

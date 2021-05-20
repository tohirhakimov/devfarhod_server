<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use App\Models\PostCategory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->has(
        //     Post::factory()->has(
        //         Tag::factory()->count(4)
        //     )->count(5)
        // )->create();

        // Category::factory(30)->create();

        Post::factory()->has(
            PostCategory::factory(
            )->count(3)
        )->create();    
    }
}

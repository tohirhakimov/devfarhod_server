<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Post;
// use App\Models\User;
// use App\Models\Tag;
// use App\Models\Category;
use App\Models\Translation;
// use GuzzleHttp\Promise\Create;

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
        //      Post::factory()->has(
        //           Tag::factory()->count(4) 
        //             )->count(5) 
        //         )->create();

        // \App\Models\User::factory(10)->create();
        // Category::factory(30)->create();
        Translation::factory(20)->create();
       
    }
}

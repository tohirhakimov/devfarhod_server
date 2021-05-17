<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
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
        User::factory(10)->hasPosts(6)->create();
        Tag::factory(\App\Models\Tag::class, 3)->create();
    }
}

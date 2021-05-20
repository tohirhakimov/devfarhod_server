<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = Post::get()->count();
        $category = Category::get()->count();
        return [
            'post_id' => ($post > 1) ? rand(1, $post) : null,
            'category_id' => ($category > 1) ? rand(1, $category) : null,
        ];
    }
}

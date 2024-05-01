<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'userId' => User::get()->random()->id,
            'name' => $this->faker->name(20),
            'text' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'category' => Str::random(10),
            'tags' => 'blabla',
            'quantityViews' => random_int(0, 10000)
        ]; 
    }
}
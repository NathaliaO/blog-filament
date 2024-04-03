<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(155),
            'body' => $this->faker->realText(500),
            'status' => fn() => collect(['draft', 'in_revision', 'publicado'])->random(),
            'author' => $this->faker->name(),
            'category' => $this->faker->word(),
            'tags' => $this->faker->words(),
        ];
    }
}

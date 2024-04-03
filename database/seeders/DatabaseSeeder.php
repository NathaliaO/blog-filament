<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@rockbuzz.com.br',
            'password' => bcrypt('12345678'),
            'papel' => 'admin'
        ]);

        $author1 = User::factory()->create([
            'name' => 'Autor 1',
            'email' => 'autor1@rockbuzz.com.br',
            'password' => bcrypt('12345678'),
            'papel' => 'autor'
        ]);

        $author2 = User::factory()->create([
            'name' => 'Autor 2',
            'email' => 'autor2@rockbuzz.com.br',
            'password' => bcrypt('12345678'),
            'papel' => 'autor'
        ]);

        User::factory()->create([
            'name' => 'Membro 1',
            'email' => 'membro1@rockbuzz.com.br',
            'password' => bcrypt('12345678'),
            'papel' => 'member'
        ]);

        User::factory()->create([
            'name' => 'Membro 2',
            'email' => 'membro2@rockbuzz.com.br',
            'password' => bcrypt('12345678'),
            'papel' => 'member'
        ]);

        Post::factory(50)->create([
            'author' => $author1->name
        ]);

        Post::factory(50)->create([
            'author' => $author2->name
        ]);
    }
}

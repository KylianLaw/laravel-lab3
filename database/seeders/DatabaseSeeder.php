<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Author::factory()
            ->count(5)
            ->has(
                Post::factory()
                    ->count(3)
                    ->has(
                        Comment::factory()
                            ->count(5)
                    )
            )
            ->create();
    }
}

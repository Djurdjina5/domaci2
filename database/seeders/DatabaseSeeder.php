<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
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
        User::truncate();
        Book::truncate();
        Category::truncate();
        Author::truncate();

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();
        $user4 = User::factory()->create();

        $type1 = Category::factory()->create();
        $type2 = Category::factory()->create();

        $author1 = Author::factory()->create();
        $author2 = Author::factory()->create();

        Book::factory(3)->create([
            'user_id' => $user1->id,
            'category_id' => $type1->id,
            'author_id' => $author1->id
        ]);
        Book::factory(4)->create([
            'user_id' => $user2->id,
            'category_id' => $type1->id,
            'author_id' => $author1->id
        ]);
        Book::factory(2)->create([
            'user_id' => $user3->id,
            'category_id' => $type2->id,
            'author_id' => $author2->id
        ]);
        Book::factory(2)->create([
            'user_id' => $user4->id,
            'category_id' => $type2->id,
            'author_id' => $author1->id
        ]);
    }
}

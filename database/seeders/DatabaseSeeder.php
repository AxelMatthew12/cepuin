<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        
        $this->call([
            ProvinceSeeder::class,
            RegencySeeder::class,
            TopicSeeder::class,
            PostSeeder::class,
        ]);

        \App\Models\User::factory(20)->create();
        Comment::factory(100)->create();
        \App\Models\Vote::factory(100)->create();
        \App\Models\Notification::factory(30)->create();
        $posts = Post::all();

        foreach ($posts as $post) {
            $commentCount = Comment::where('post_id', $post->id)->count();

            $post->comment_count = $commentCount;
            $post->save();
        }
    }
}

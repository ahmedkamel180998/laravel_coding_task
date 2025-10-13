<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch posts from API
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->successful()) {
            $posts = $response->json();

            foreach ($posts as $post) {
                Post::create([
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                    'user_id' => $post['userId'],
                ]);
            }

            $this->command->info('Posts seeded successfully!');
        } else {
            $this->command->error('Failed to fetch posts from API');
        }
    }
}

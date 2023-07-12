<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'user_id'=>'1',
                'title' => 'First Post',
                'slug' => 'first-post',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                'user_id'=>'3',
                'title' => 'First Post1',
                'slug' => 'first-post1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                'user_id'=>'2',
                'title' => 'Second Post',
                'slug' => 'second-post',
                'description' => 'Pellentesque ac lectus euismod, lobortis dolor id, faucibus ipsum.',
            ],
            // Add more posts here if needed
        ];

        DB::table('posts')->insertOrIgnore($posts);

        
    }
}

//dd($posts)
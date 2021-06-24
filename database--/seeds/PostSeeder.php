<?php

use App\Models\Post;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postRecord = [
            [
                'title' => 'This is seed post title for my blog',
                'description' => 'description'
            ]
        ];
        Post::insert($postRecord);
    }
}

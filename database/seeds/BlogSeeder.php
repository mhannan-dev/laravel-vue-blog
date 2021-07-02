<?php

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogRecord = [
            [
                'title' => 'Post One',
                'user_id' => 1,
                'blog_excerpt' => 'Post boy text excerpt',
                'slug' => 'post-one',
                'image' => 'default.png',
                'views' => 0,
                'post_desc' => 'Post desc',
                'meta_desc' => 'Meta desc',
            ],
            [
                'title' => 'Post two',
                'user_id' => 1,
                'blog_excerpt' => 'Post boy text excerpt',
                'slug' => 'post-two',
                'image' => 'default.png',
                'views' => 0,
                'post_desc' => 'Post desc two',
                'meta_desc' => 'Meta desc two',
            ]
        ];
        Blog::insert($blogRecord);
    }
}

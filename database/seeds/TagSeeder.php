<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagRecord = [
            [
                'title' => 'Database',
                'slug' => 'database',
            ],
            [
                'title' => 'Framework',
                'slug' => 'framework',

            ]
        ];
        Tag::insert($tagRecord);
    }
}

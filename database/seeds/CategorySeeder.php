<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecord = [
            [
                'title' => 'Framework',
                'slug' => 'framework',
                'icon_image' => 'default.png'
            ],
            [
                'title' => 'Database',
                'slug' => 'database',
                'icon_image' => 'default.png'
            ]
        ];
        Category::insert($categoryRecord);
    }
}

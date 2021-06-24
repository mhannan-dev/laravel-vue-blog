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
                'name' => 'Electronic',
                'slug' => 'electronic'
            ]
        ];
        Category::insert($categoryRecord);
    }
}

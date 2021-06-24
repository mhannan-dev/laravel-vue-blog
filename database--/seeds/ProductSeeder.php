<?php
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecord = [
            [
                'title' => 'This is seed post title for my blog',
                'description' => 'description',
                'image' => 'default.png',
                'slug' => 'slug',
                'price' => 150.00,
                'status' => 1
            ]
        ];
        Product::insert($productRecord);
    }
}

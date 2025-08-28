<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Smartphone X', 'description' => 'Smartphone terbaru', 'price' => 500, 'category' => 'Electronics'],
            ['name' => 'T-Shirt Premium', 'description' => 'Baju kaos berkualitas', 'price' => 20, 'category' => 'Fashion'],
            ['name' => 'Novel Best Seller', 'description' => 'Cerita menarik', 'price' => 15, 'category' => 'Books'],
            ['name' => 'Chocolate Cake', 'description' => 'Coklat lezat', 'price' => 10, 'category' => 'Food'],
            ['name' => 'Football', 'description' => 'Bola sepak resmi', 'price' => 30, 'category' => 'Sports'],
        ];

        foreach ($products as $p) {
            $category = Category::where('name', $p['category'])->first();
            Product::create([
                'name' => $p['name'],
                'description' => $p['description'],
                'price' => $p['price'],
                'category_id' => $category->id,
            ]);
        }
    }
}

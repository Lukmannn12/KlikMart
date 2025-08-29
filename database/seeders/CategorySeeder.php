<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik', 'image' => 'categories/elektronik.jpeg'],
            ['name' => 'Fashion', 'image' => 'categories/elektronik.jpeg'],
            ['name' => 'Kesehatan', 'image' => 'categories/elektronik.jpeg'],
            ['name' => 'Olahraga', 'image' => 'categories/elektronik.jpeg'],
            ['name' => 'Hobi & Mainan', 'image' => 'categories/elektronik.jpeg'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

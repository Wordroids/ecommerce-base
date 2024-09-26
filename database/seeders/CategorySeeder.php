<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Devices, gadgets, and accessories.'],
            ['name' => 'Clothing', 'description' => 'Fashion and clothing items.'],
            ['name' => 'Books', 'description' => 'Various books and reading materials.'],
            ['name' => 'Home & Kitchen', 'description' => 'Home and kitchen appliances.'],
            ['name' => 'Sports', 'description' => 'Sporting goods and equipment.'],
            ['name' => 'Beauty & Health', 'description' => 'Beauty and health products.'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']), // Generate slug from the name
                'description' => $category['description'] ?? null, // Optional description
            ]);
        }
    }
}

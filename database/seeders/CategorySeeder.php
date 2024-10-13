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
         // Creating root categories
         $electronics = Category::create(['name' => 'Electronics']);
         $fashion = Category::create(['name' => 'Fashion']);
 
         // Creating sub-categories under Electronics
         Category::create(['name' => 'Mobile Phones', 'parent_id' => $electronics->id]);
         Category::create(['name' => 'Laptops', 'parent_id' => $electronics->id]);
 
         // Creating sub-categories under Fashion
         Category::create(['name' => 'Men Clothing', 'parent_id' => $fashion->id]);
         Category::create(['name' => 'Women Clothing', 'parent_id' => $fashion->id]);
    }
}

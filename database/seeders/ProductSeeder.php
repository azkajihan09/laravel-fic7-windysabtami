<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();
        
        for ($i= 0; $i < 100; $i++) {
            $user = $users->random();
            $category = $categories->random();

            Product::factory()->create([
                'user_id' => $user->id,
                'category_id' => $category->id
            ]);
        }
    }
}

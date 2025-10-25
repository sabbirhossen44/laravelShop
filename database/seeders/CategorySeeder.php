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
        Category::query()->delete();
        $data = [
            [
                'id' => 1,
                'name' => 'Electronics',
                'slug' => 'electronics',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Fashion',
                'slug' => 'fashion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Home & Living',
                'slug' => 'home-&-Living',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Groceries & Food',
                'slug' => 'groceries-&-food',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Sports & Fitness',
                'slug' => 'sports-&-fitness',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Category::insert($data);
    }
}

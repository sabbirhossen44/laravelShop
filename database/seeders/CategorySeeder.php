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
        $data = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
            ],
            [
                'name' => 'Fashion',
                'slug' => 'fashion',
            ],
            [
                'name' => 'Home & Living',
                'slug' => 'home-&-Living',
            ],
            [
                'name' => 'Groceries & Food',
                'slug' => 'groceries-&-food',
            ],
            [
                'name' => 'Sports & Fitness',
                'slug' => 'sports-&-fitness',
            ],
        ];

        foreach ($data as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}

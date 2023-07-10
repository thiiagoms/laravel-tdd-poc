<?php

namespace Database\Seeders\Category;

use App\Models\Category\Category;
use Carbon\Carbon;
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
        $categories = [
            ['id' => 1, 'name'=> 'Fresh Produce'],
            ['id' => 2, 'name'=> 'Dairy and Eggs'],
            ['id' => 3, 'name'=> 'Meat and Poultry'],
            ['id' => 4, 'name'=> 'Bakery'],
            ['id' => 5, 'name'=> 'Frozen Foods'],
            ['id' => 6, 'name'=> 'Beverages'],
            ['id' => 7, 'name'=> 'Pantry Staples'],
            ['id' => 8, 'name'=> 'Snacks'],
            ['id' => 9, 'name'=> 'Household Essentials'],
            ['id' => 10, 'name' => 'Health and Wellness']
        ];

        $timestamp = Carbon::now('America/Sao_Paulo');

        $categories = array_map(fn ( array $category ): array =>
            array_merge($category,['created_at' => $timestamp , 'updated_at' => $timestamp]),
        $categories);

        Category::insert($categories);
    }
}

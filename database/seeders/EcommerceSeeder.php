<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class EcommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesCount = rand(3, 5);
        for ($i = 0; $i < $categoriesCount; $i++)
            Category::factory()->hasProducts(rand(1, 10))->create();
    }
}

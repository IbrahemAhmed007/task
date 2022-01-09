<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $path = public_path('uploads/products');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $price = $this->faker->randomFloat(2, 100, 10000);
        return [
            'name' => $this->faker->name,
            'old_price' => $price,
            'price' => $price - $this->faker->numberBetween(0, $price),
            'image' => $this->faker->image($path),
            'description' => $this->faker->text(),
            'qty' => $this->faker->numberBetween(0, 20),
            'category_id' => Category::factory(),
        ];
    }
}

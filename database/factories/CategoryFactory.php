<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $path = 'uploads/categories';
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777);
        }
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->image($path),
        ];
    }
}

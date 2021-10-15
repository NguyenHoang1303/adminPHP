<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->realText(),
            'detail' => $this->faker->realText(),
            'price' => rand(50000,500000),
            'categoryId' => rand(1,6),
            'thumbnail' => $this->faker->image(),
            'status' => rand(-1,1),
        ];
    }
}

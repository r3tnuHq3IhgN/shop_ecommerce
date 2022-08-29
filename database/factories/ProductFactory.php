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
        $category_name = $this->faker->name();
        $slug = Str::slug($category_name);
        return [
            //
            'name' => $category_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(200),
            'regular_price' => $this->faker->numberBetween(200,1500),
            'sale_price' => $this->faker->numberBetween(100,500),
            'image' => 'digital_'.$this->faker->unique()->numberBetween(1, 22).'.jpg',
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}

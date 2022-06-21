<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $faker = \Faker\Factory::create('id_ID'); // more information : https://github.com/fzaninotto/Faker
        return [
            'item_name' => "Computer",
            'description' => "hahah hehehhooo",
            'category' => $this->faker->randomElement(['PC', 'Kursi', 'Meja', 'Sensor', 'Controller', 'etc']),
            'quantity' => 5,
            'storage' => "lemari besi",
            'image_url' => 'computer.jpg',
            'status' => $this->faker->randomElement(['Ready', 'Borrowed', 'Maintenance']),
        ];
    }
}

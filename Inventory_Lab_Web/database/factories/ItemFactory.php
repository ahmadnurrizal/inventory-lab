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
            'name' => "Computer",
            'description' => "hahah hehehhooo",
            'stored_location' => "lemari besi",
            'category' => "eletronik",
            'quantity' => 5,
            'image_path' => 'computer.jpg',
            'status' => 'ready',
        ];
    }
}

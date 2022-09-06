<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $address = mb_substr($this->faker->address, 9);
        return [
            'm_name' => $this->faker->name,
            's_name1' => $this->faker->lastName,
            'f_name1' => $this->faker->firstName,
            'tel1' => $this->faker->phoneNumber,
            'postcode' => $this->faker->postcode,
            'address1' => $address,
            'memo' => $this->faker->realText(50),
        ];
    }
}

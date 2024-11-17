<?php

namespace Database\Factories\Guest;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{
    /**
     * @return array<string, int|string>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'phone_code' => rand(1, 999),
            'phone_number' => $this->faker->unique()->randomNumber(9, true),
            'country' => $this->faker->country,
        ];
    }
}

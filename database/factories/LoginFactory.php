<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LoginFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(6, 20)
        ];
    }
}

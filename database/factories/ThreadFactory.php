<?php

namespace Database\Factories;

use App\Models\Chanel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(5),
            "body" => fake()->sentence(30),
            "user_id" => User::factory(),
            "chanel_id" => Chanel::factory(),
        ];
    }
}

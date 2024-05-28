<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullName' => fake()->unique()->name(),
            'email' => fake()->unique()->email(),
            'password' => bcrypt('123456'),
            'born' => fake()->date(),
            'birthplace' => fake()->streetName(),
            'height' => fake()->randomFloat('2', 0, 2),
            'playingRole' => fake()->randomElement(['Batsman', 'Bowler', 'Allrounder']),
            'battingStyle' => fake()->randomElement(['RightHanded', 'LeftHanded']),
            'bowlingStyle' => fake()->randomElement(['RightHanded', 'LeftHanded']),
            'playerImage' => fake()->imageUrl(),
            'price' => '500',
        ];
    }
}

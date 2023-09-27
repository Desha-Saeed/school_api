<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $levelNumber = 1;
        return [
            'name' => 'Level' + $levelNumber++,
            'code' => $this->faker->randomNumber(),
            'description' => $this->faker->text()

        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrepareActions>
 */
class PrepareActionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'when' => $this->faker->date() ." ". $this->faker->time(),
            'where' => $this->faker->streetAddress(),
            'note' => $this->faker->text(350),
            'visible' => true,
        ];
    }
}

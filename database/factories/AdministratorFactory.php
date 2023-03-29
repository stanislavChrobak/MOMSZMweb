<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Administrator>
 */
class AdministratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Peter',
            'password' => '$2y$10$PLOwc6Mvf4tOxu3i.T/s2em22mw9nvc9t5h5JH7/7kZwOgrZGQt7G',
        ];
    }
}

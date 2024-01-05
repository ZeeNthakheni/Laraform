<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\submissions;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\submissions>
 */
class SubmissionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    protected $model = submissions::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'message' => fake()->paragraph()
        ];
    }
}

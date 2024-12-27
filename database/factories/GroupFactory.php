<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => $this->faker->numberBetween(1, 10),
            'course_id' => $this->faker->numberBetween(1, 10),
            'days_in_a_week' => $this->faker->randomElement(['Mon,Web,Fri', 'Tue,Thu', 'Mon,Tue']),
            'start_time' => $this->faker->time('H:i:s'),
            'end_time' => $this->faker->time('H:i:s'),
            'start_date' => $this->faker->dateTimeBetween('2024-12-01', '2024-12-31')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('2025-01-01', '2025-01-31')->format('Y-m-d'),
        ];
    }
}

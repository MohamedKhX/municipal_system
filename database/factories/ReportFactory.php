<?php

namespace Database\Factories;

use App\Enums\ReportStatus;

use App\Models\ReportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->paragraphs(asText: true),
            'location_latitude' => fake()->latitude(),
            'location_longitude' => fake()->longitude(),
            'street' => fake()->streetAddress(),
            'status' => fake()->randomElement(ReportStatus::values()),

            'report_type_id' => fake()->randomElement([1,2,3,4,5,6,7,8,9]),
            'user_id' => 1,
            'municipality_id' => 1
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicineMeetingRoom>
 */
class MedicineMeetingRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city(),
            'short_name' => $this->faker->city(),
            'minimum_attendees' => $this->faker->numberBetween(4,10),
            'maximum_attendees' => $this->faker->numberBetween(10, 300),
            'advance_booking_under_days' => 365,
            'location' => $this->faker->country(),
            'images' => ['storage/image/test.jpg'],
        ];
    }
}

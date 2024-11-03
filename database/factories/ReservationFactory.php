<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            'customer_name' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'number_of_guests' => $this->faker->numberBetween(1, 10),
            'reservation_date' => $this->faker->date(),
            'reservation_time' => $this->faker->time(),
        ];
    }
}

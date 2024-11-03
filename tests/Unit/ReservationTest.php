<?php

namespace Tests\Unit;

use App\Models\Reservation;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_reservation()
    {
        $user = User::factory()->create();

        Reservation::factory()->create([
            'user_id' => $user->id,
            'customer_name' => 'John Doe',
            'phone_number' => '1234567890',
            'number_of_guests' => 4,
            'reservation_date' => '2024-12-01',
            'reservation_time' => '18:00:00',
        ]);

        // Assert database contains the expected data
        $this->assertDatabaseHas('reservations', [
            'customer_name' => 'John Doe',
            'phone_number' => '1234567890',
            'number_of_guests' => 4,
            'reservation_date' => '2024-12-01',
            'reservation_time' => '18:00:00',
        ]);
    }

    public function test_it_has_a_customer_name()
    {
        $user = User::factory()->create();

        Reservation::factory()->create([
            'user_id' => $user->id,
            'customer_name' => 'Jane Doe',
        ]);

        $this->assertDatabaseHas('reservations', [
            'customer_name' => 'Jane Doe',
        ]);
    }

    public function test_it_has_a_phone_number()
    {
        $user = User::factory()->create();

        Reservation::factory()->create([
            'user_id' => $user->id,
            'phone_number' => '0987654321',
        ]);

        $this->assertDatabaseHas('reservations', [
            'phone_number' => '0987654321',
        ]);
    }
}

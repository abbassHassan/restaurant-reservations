<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Reservation;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class ReservationAccessTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function guest_users_cannot_access_reservations()
    {
        $this->get(route('reservations.index'))
             ->assertRedirect(route('login'));
    }

    #[Test]
    public function regular_users_can_view_reservations_but_cannot_delete_them()
    {
        $user = User::factory()->create(['role' => 'user']);
        $this->actingAs($user);

        $reservation = Reservation::factory()->create(['user_id' => $user->id]);

        $this->get(route('reservations.index'))
             ->assertStatus(200);

        $this->delete(route('reservations.destroy', $reservation))
             ->assertStatus(403);
    }

    #[Test]
    public function admin_users_can_delete_reservations()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $reservation = Reservation::factory()->create(['user_id' => $admin->id]);

        $this->delete(route('reservations.destroy', $reservation))
             ->assertStatus(302);
             
        $this->assertDatabaseMissing('reservations', [
            'id' => $reservation->id,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    use AuthorizesRequests;

   
    public function index(Request $request)
    {
        $user = Auth::user();

        $search = $request->input('search');

        $reservationsQuery = $user->reservations();

        if ($search) {
            $reservationsQuery->where(function ($query) use ($search) {
                $query->where('customer_name', 'like', '%' . $search . '%')
                      ->orWhere('reservation_date', 'like', '%' . $search . '%');
            });
        }

        $reservations = $reservationsQuery->paginate(5);

        return view('reservations.index', compact('reservations', 'search'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'number_of_guests' => 'required|integer|min:1',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required|date_format:H:i',
        ]);

        $user = Auth::user();
        $user->reservations()->create($request->only([
            'customer_name',
            'phone_number',
            'number_of_guests',
            'reservation_date',
            'reservation_time',
        ]));

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function show(Reservation $reservation)
    {
        $this->authorize('view', $reservation);
        return view('reservations.show', compact('reservation'));
    }

  
    public function edit(Reservation $reservation)
    {
        $this->authorize('update', $reservation);
        return view('reservations.edit', compact('reservation'));
    }

  
    public function update(Request $request, Reservation $reservation)
    {
        Log::info('Entering update method for reservation: ' . $reservation->id);

        $this->authorize('update', $reservation);
        Log::info('Authorization passed');

        try {
            $validatedData = $request->validate([
                'customer_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15',
                'number_of_guests' => 'required|integer|min:1',
                'reservation_date' => 'required|date',
                'reservation_time' => 'required|date_format:H:i',
            ]);

            Log::info('Validation passed with data:', $validatedData);

            $reservation->update($validatedData);

            Log::info('Update successful:', $reservation->fresh()->toArray());

            return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed:', $e->errors());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('An error occurred during update:', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while updating the reservation.');
        }
    }

   
    public function destroy(Reservation $reservation)
    {
        $this->authorize('delete', $reservation);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}

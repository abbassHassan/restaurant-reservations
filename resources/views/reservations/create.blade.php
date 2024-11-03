@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold mb-6">Create New Reservation</h1>

    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="flex flex-col">
            <label for="customer_name" class="text-gray-700">Customer Name</label>
            <input type="text" id="customer_name" name="customer_name" class="px-4 py-2 border rounded-lg focus:outline-none" required>
        </div>

        <div class="flex flex-col">
            <label for="phone_number" class="text-gray-700">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="px-4 py-2 border rounded-lg focus:outline-none" required>
        </div>

        <div class="flex flex-col">
            <label for="number_of_guests" class="text-gray-700">Number of Guests</label>
            <input type="number" id="number_of_guests" name="number_of_guests" class="px-4 py-2 border rounded-lg focus:outline-none" required>
        </div>

        <div class="flex flex-col">
            <label for="reservation_date" class="text-gray-700">Reservation Date</label>
            <input type="date" id="reservation_date" name="reservation_date" class="px-4 py-2 border rounded-lg focus:outline-none" required>
        </div>

        <div class="flex flex-col">
            <label for="reservation_time" class="text-gray-700">Reservation Time</label>
            <input type="time" id="reservation_time" name="reservation_time" class="px-4 py-2 border rounded-lg focus:outline-none" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Create Reservation</button>
    </form>
</div>
@endsection

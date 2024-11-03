@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-semibold mb-4">Your Reservations</h1>

    <a href="{{ route('reservations.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-block">Add New Reservation</a>

    <form method="GET" action="{{ route('reservations.index') }}" class="mb-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by customer name or date" class="px-4 py-2 border rounded-md" />
        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md">Search</button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg">
            <thead>
                <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Customer Name</th>
                    <th class="py-3 px-6 text-left">Phone Number</th>
                    <th class="py-3 px-6 text-left">Guests</th>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Time</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($reservations as $reservation)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $reservation->customer_name }}</td>
                    <td class="py-3 px-6">{{ $reservation->phone_number }}</td>
                    <td class="py-3 px-6">{{ $reservation->number_of_guests }}</td>
                    <td class="py-3 px-6">{{ $reservation->reservation_date }}</td>
                    <td class="py-3 px-6">{{ $reservation->reservation_time }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('reservations.edit', $reservation) }}" class="px-4 py-2 bg-yellow-400 text-white rounded-md">Edit</a>
                        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-3 px-6 text-center text-gray-500">No reservations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-center">
        {{ $reservations->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection

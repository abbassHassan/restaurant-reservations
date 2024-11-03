@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Manage your reservations and explore restaurants with ease.</h1>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('reservations.index') }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-105">
                View Reservations
            </a>

            <a href="{{ route('restaurants.index') }}" 
               class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-105">
                View Restaurants
            </a>
        </div>
    </div>
@endsection

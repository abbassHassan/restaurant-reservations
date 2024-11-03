@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Restaurants Details</h1>

        @if(count($restaurants) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($restaurants as $restaurant)
                    <div class="bg-white rounded-lg shadow-md p-6 transition-transform transform hover:scale-105">
                        <img src="{{ $restaurant['image_url'] }}" alt="{{ $restaurant['name'] }}" class="w-full h-40 object-cover rounded-lg mb-4">
                        
                        <h2 class="text-xl font-semibold">{{ $restaurant['name'] }}</h2>
                        <p class="text-gray-600">{{ implode(', ', $restaurant['location']['display_address']) }}</p>
                        <p class="text-gray-600">Phone: {{ $restaurant['display_phone'] ?? 'N/A' }}</p>
                        <p class="text-gray-600">Rating: {{ $restaurant['rating'] }} / 5 ({{ $restaurant['review_count'] }} reviews)</p>
                        <p class="text-gray-600">Price: {{ $restaurant['price'] ?? 'N/A' }}</p>

                        <h3 class="mt-4 font-semibold">Categories:</h3>
                        <ul class="text-gray-600 list-disc pl-5">
                            @foreach($restaurant['categories'] as $category)
                                <li>{{ $category['title'] }}</li>
                            @endforeach
                        </ul>

                        <a href="{{ $restaurant['url'] }}" target="_blank" class="text-blue-500 mt-4 inline-block">View on Yelp</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No restaurants found for the specified location.</p>
        @endif
    </div>
@endsection

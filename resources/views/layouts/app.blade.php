<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="container mx-auto flex justify-between items-center p-4">
            <span class="text-gray-800 font-bold text-2xl tracking-tight transition">
                Reserve App
            </span>

            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="text-gray-800 font-medium px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100 transition-all duration-200 ease-in-out shadow-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mx-auto my-12 px-6">
        <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-100 relative">
            @if(request()->routeIs('reservations.index') || request()->routeIs('restaurants.index'))
                <div class="flex justify-start mb-4">
                    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                        &larr; Back
                    </a>
                </div>
            
            @endif

            @yield('content')
        </div>
    </main>

    @vite('resources/js/app.js')
</body>
</html>

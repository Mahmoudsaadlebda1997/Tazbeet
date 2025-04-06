<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tazbeet Car Wash</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Navbar -->
<nav class="bg-blue-600 shadow-md">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
        <a href="#" class="text-2xl font-bold text-white">Tazbeet</a>
        <div class="hidden md:flex space-x-6">
            <a href="#services" class="text-white hover:text-gray-200">Services</a>
            <a href="#reservation-form" class="text-white hover:text-gray-200">Book Now</a>
            <a href="#contact" class="text-white hover:text-gray-200">Contact</a>
        </div>
        <div class="md:hidden">
            <button class="text-white focus:outline-none">
                ☰
            </button>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="relative bg-blue-500 text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to Tazbeet Car Wash</h1>
        <p class="text-lg mb-6">Get your car looking brand new with our professional car wash services!</p>
        <a href="#services" class="bg-white text-blue-500 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100">Explore Services</a>
    </div>
</div>

<!-- Car Wash Services -->
<div id="services" class="container mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-8 text-center">Our Car Wash Services</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @php
            $services = [
                ['name' => 'Exterior Wash', 'image' => 'https://example.com/images/exterior.jpg', 'description' => 'Quick clean for your car’s exterior.'],
                ['name' => 'Full Wash', 'image' => 'https://example.com/images/full.jpg', 'description' => 'Complete inside-out cleaning.'],
                ['name' => 'Engine Cleaning', 'image' => 'https://example.com/images/engine.jpg', 'description' => 'Detailed engine bay cleaning.'],
                ['name' => 'Deluxe Wash', 'image' => 'https://example.com/images/deluxe.jpg', 'description' => 'Premium wash with wax & polish.'],
            ];
        @endphp

        @foreach ($services as $service)
            <div class="border rounded-lg shadow-md p-4 hover:shadow-lg transition duration-300 bg-white">
                <img src="data:image/webp;base64,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" alt="{{ $service['name'] }}" class="w-full h-48 object-cover rounded">
                <div class="mt-4">
                    <h3 class="text-xl font-semibold">{{ $service['name'] }}</h3>
                    <p class="text-gray-600">{{ $service['description'] }}</p>
                    <a href="#reservation-form" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Book Now
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Reservation Form -->
<div id="reservation-form" class="bg-gray-100 py-12">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl font-bold mb-8">Make a Reservation</h1>
        <form action="{{ route('reservations.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="car_model" class="block text-gray-700">Car Model</label>
                    <input type="text" name="car_model" id="car_model" class="w-full border rounded p-2" placeholder="Car Model" required>
                </div>
                <div class="mb-4">
                    <label for="seat_number" class="block text-gray-700">Seat Number</label>
                    <input type="text" name="seat_number" id="seat_number" class="w-full border rounded p-2" placeholder="Seat Number" required>
                </div>
                <div class="mb-4">
                    <label for="wash_type" class="block text-gray-700">Wash Type</label>
                    <select name="wash_type" id="wash_type" class="w-full border rounded p-2" required>
                        <option value="Exterior Wash">Exterior Wash</option>
                        <option value="Full Wash">Full Wash</option>
                        <option value="Engine Cleaning">Engine Cleaning</option>
                        <option value="Deluxe Wash">Deluxe Wash</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="car_type" class="block text-gray-700">Car Type</label>
                    <input type="text" name="car_type" id="car_type" class="w-full border rounded p-2" placeholder="Car Type" required>
                </div>
                <div class="mb-4">
                    <label for="wanted_time" class="block text-gray-700">Preferred Time</label>
                    <input type="datetime-local" name="wanted_time" id="wanted_time" class="w-full border rounded p-2" required>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600">
                Reserve Now
            </button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer id="contact" class="bg-gray-800 text-white py-8">
    <div class="container mx-auto text-center">
        <p class="mb-4">&copy; 2025 Tazbeet Car Wash. All rights reserved.</p>
        <div class="flex justify-center space-x-4">
            <a href="#" class="hover:text-gray-400">Privacy Policy</a>
            <a href="#" class="hover:text-gray-400">Terms of Service</a>
            <a href="#" class="hover:text-gray-400">Contact</a>
        </div>
    </div>
</footer>

</body>
</html>

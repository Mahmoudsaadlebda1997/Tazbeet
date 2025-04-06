@php
    $reservations = \App\Models\Reservation::all();
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ "Tazbeet Dashboard" }}
            </h2>
            <a href="{{ route('site') }}" class="text-xl font-italic text-gray-800 dark:text-gray-200 hover:text-blue-500">
                {{ "Visit Tazbeet Site" }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Create Button -->
            <div class="flex justify-end mb-4">
                <button id="openCreateModal"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Add New Reservation
                </button>
            </div>

            <!-- Reservations Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse rounded-lg shadow-lg">
                    <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                        <th class="py-3 px-4 border-b text-center">#</th>
                        <th class="py-3 px-4 border-b text-left">Car Model</th>
                        <th class="py-3 px-4 border-b text-left">Seat Number</th>
                        <th class="py-3 px-4 border-b text-left">Wash Type</th>
                        <th class="py-3 px-4 border-b text-left">Car Type</th>
                        <th class="py-3 px-4 border-b text-left">Wanted Time</th>
                        <th class="py-3 px-4 border-b text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reservations as $reservation)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 border-b transition duration-300">
                            <td class="py-3 px-4 text-center">{{ $reservation->id }}</td>
                            <td class="py-3 px-4">{{ $reservation->car_model }}</td>
                            <td class="py-3 px-4">{{ $reservation->seat_number }}</td>
                            <td class="py-3 px-4">{{ $reservation->wash_type }}</td>
                            <td class="py-3 px-4">{{ $reservation->car_type }}</td>
                            <td class="py-3 px-4">{{ $reservation->wanted_time }}</td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button onclick="openEditModal({{ $reservation->id }}, '{{ $reservation->car_model }}', '{{ $reservation->seat_number }}', '{{ $reservation->wash_type }}', '{{ $reservation->car_type }}', '{{ $reservation->wanted_time }}')"
                                            class="edit-button bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-1 px-3 rounded">
                                        Edit
                                    </button>
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @if ($reservations->isEmpty())
                <div class="text-center mt-6 text-gray-500 dark:text-gray-400">
                    No reservations available.
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div id="reservationModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
        <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-lg shadow-lg p-6">
            <h3 id="modalTitle" class="text-lg font-bold mb-4">Create Reservation</h3>

            <!-- Form -->
            <form id="reservationForm">
                @csrf
                <input type="hidden" id="reservationId">

                <div class="mb-4">
                    <input type="text" id="car_model" name="car_model" class="w-full border rounded p-2" placeholder="Car Model" required>
                </div>
                <div class="mb-4">
                    <input type="text" id="seat_number" name="seat_number" class="w-full border rounded p-2" placeholder="Seat Number">
                </div>
                <div class="mb-4">
                    <input type="text" id="wash_type" name="wash_type" class="w-full border rounded p-2" placeholder="Wash Type">
                </div>
                <div class="mb-4">
                    <input type="text" id="car_type" name="car_type" class="w-full border rounded p-2" placeholder="Car Type">
                </div>
                <div class="mb-4">
                    <input type="datetime-local" id="wanted_time" name="wanted_time" class="w-full border rounded p-2">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="submit"
                            class="bg-black hover:bg-black text-blue font-bold py-2 px-4 rounded">
                        Save
                    </button>
                    <button type="button" id="closeModal"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#openCreateModal').on('click', function () {
            $('#modalTitle').text('Add New Reservation');
            $('#reservationId').val('');
            $('#car_model').val('');
            $('#seat_number').val('');
            $('#wash_type').val('');
            $('#car_type').val('');
            $('#wanted_time').val('');
            $('#reservationModal').removeClass('hidden');
        });

        window.openEditModal = function (id, car_model, seat_number, wash_type, car_type, wanted_time) {
            $('#modalTitle').text('Edit Reservation');
            $('#reservationId').val(id);
            $('#car_model').val(car_model);
            $('#seat_number').val(seat_number);
            $('#wash_type').val(wash_type);
            $('#car_type').val(car_type);
            $('#wanted_time').val(wanted_time);
            $('#reservationModal').removeClass('hidden');
        };

        $('#reservationForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#reservationId').val();
            const url = id ? `/reservations/${id}` : `/reservations`;
            const method = id ? 'PATCH' : 'POST';
            let formData = $(this).serialize();

            $.ajax({
                url: url,
                method: method,
                data: formData,
                success: function () {
                    $('#reservationModal').addClass('hidden');
                    location.reload();
                },
                error: function (response) {
                    alert(response.responseJSON.message);
                }
            });
        });

        $('#closeModal').on('click', function () {
            $('#reservationModal').addClass('hidden');
        });
    </script>
</x-app-layout>

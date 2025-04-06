<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Display a listing of reservations
    public function index()
    {
        $reservations = Reservation::all();
        return view('dashboard', compact('reservations'));
    }

    // Store a newly created reservation
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'car_model' => 'required|string|max:255',
            'seat_number' => 'nullable|string|max:255',
            'wash_type' => 'nullable|string|max:255',
            'car_type' => 'nullable|string|max:255',
            'wanted_time' => 'nullable|date',
        ]);

        // Create the reservation
        Reservation::create($request->all());

        // Redirect back to the previous page with the session flash data if necessary
        return redirect()->back()->with('success', 'Reservation created successfully.');
    }


    // Update the specified reservation
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'car_model' => 'required|string|max:255',
            'seat_number' => 'nullable|string|max:255',
            'wash_type' => 'nullable|string|max:255',
            'car_type' => 'nullable|string|max:255',
            'wanted_time' => 'nullable|date',
        ]);

        $reservation->update($request->all());

        return response()->json(['message' => 'Reservation updated successfully.']);
    }

    // Remove the specified reservation
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation deleted successfully.');
    }
    public function site()
    {
        $reservations = Reservation::all();
        return view('site', compact('reservations'));
    }

}

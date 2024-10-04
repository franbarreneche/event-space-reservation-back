<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ReservationResource::make(
            $request->user()->reservations
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        $validated = $request->validated();

        $reservation = Reservation::query()->create([
            ...$validated,
            'user_id' => $request->user()->id,
        ]);

        return ReservationResource::make($reservation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return ReservationResource::make($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $validated = $request->validated();

        $reservation->update([
            ...$validated,
        ]);

        return ReservationResource::make($reservation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json(null, 200);
    }
}

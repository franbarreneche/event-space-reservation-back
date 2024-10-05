<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Reservation::class);

        return ReservationResource::make(
            $request->user()->reservations
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        Gate::authorize('create', Reservation::class);

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
        Gate::authorize('view', $reservation);

        return ReservationResource::make($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        Gate::authorize('update', $reservation);

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
        Gate::authorize('delete', $reservation);

        $reservation->delete();

        return response()->json(null, 200);
    }
}

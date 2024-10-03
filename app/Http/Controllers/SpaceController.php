<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpaceRequest;
use App\Http\Resources\SpaceResource;
use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SpaceResource::collection(
            Space::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpaceRequest $request)
    {
        $validated = $request->validated();

        $space = Space::query()->create($validated);

        $files = $request->file('images');

        $fileNames = [];
        foreach ($files as $file) {
            $fileName = $space->id . '_' . $file->hashName();
            $file->storeAs('uploads', $fileName, 'public');
            $fileNames[] = $fileName;
        }

        $space->update(['images' => $fileNames]);

        return SpaceResource::make($space);
    }

    /**
     * Display the specified resource.
     */
    public function show(Space $space)
    {
        return SpaceResource::make($space);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpaceRequest $request, Space $space)
    {
        $validated = $request->validated();

        $space->update($validated);

        $files = $request->file('images');

        $fileNames = [];
        foreach ($files as $file) {
            $fileName = $space->id . '_' . $file->hashName();
            $file->storeAs('uploads', $fileName, 'public');
            $fileNames[] = $fileName;
        }

        $space->update(['images' => $fileNames]);

        return SpaceResource::make($space);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Space $space)
    {
        $space->delete();

        return response()->json(null, 200);
    }
}

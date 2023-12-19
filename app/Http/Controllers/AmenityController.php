<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Amenity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $amenities = Amenity::all();
        return view('amenity.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        $data = request()->validate(
            [
                'title' => 'string',
            ]
        );
        Amenity::create($data);
        return redirect()->route('amenity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Amenity $amenity)
    {
        return view('amenity.show', compact('amenity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amenity $amenity)
    {
        return view('amenity.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Amenity $amenity)
    {
        $data = request()->validate(
            [
                'title' => 'string',
            ]
        );
        $amenity->update($data);
        return redirect()->route('amenity.show', $amenity->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return redirect()->route('amenity.index');
    }
}

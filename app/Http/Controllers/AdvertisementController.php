<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $advertisements = Advertisement::all();
        return view('advertisement.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $amenities = Amenity::all();
        return view('advertisement.create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        $data = request()->validate(
            [
                'title' => 'string',
                'description' => 'string',
                'amenities' => 'array',
                'amenities.*' => 'string'
            ]
        );
        if (!empty($data['amenities'])) {
            Advertisement::create($data)->amenities()->attach($data['amenities']);
        } else {
            Advertisement::create($data);
        }
        return redirect()->route('advertisement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        $amenities = $advertisement->amenities()->get();
        return view('advertisement.show', compact('advertisement', 'amenities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        $amenitiesAll = Amenity::all();
        $amenitiesOfAdvertisement = $advertisement->amenities()->get();
        return view(
            'advertisement.edit',
            compact('advertisement', 'amenitiesAll', 'amenitiesOfAdvertisement')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Advertisement $advertisement)
    {
        $data = request()->validate(
            [
                'title' => 'string',
                'description' => 'string',
                'amenities' => 'array',
                'amenities.*' => 'string'
            ]
        );
        $advertisement->update($data);
        if (!empty($data['amenities'])) {
            $advertisement->amenities()->sync($data['amenities']);
        } else {
            $advertisement->amenities()->sync([]);
        }
        return redirect()->route('advertisement.show', $advertisement->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('advertisement.index');
    }
}

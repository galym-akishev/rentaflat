<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
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
        return view('advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        $data = request()->validate(
            [
                'title' => 'string',
                'description' => 'string'
            ]
        );
        Advertisement::create($data);
        return redirect()->route('advertisement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        $amenities = $advertisement->amenities()->get(['title']);
        return view('advertisement.show', compact('advertisement', 'amenities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        return view('advertisement.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Advertisement $advertisement)
    {
        $data = request()->validate(
            [
                'title' => 'string',
                'description' => 'string'
            ]
        );
        $advertisement->update($data);
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

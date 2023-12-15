<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
    public function store(Request $request)
    {
        dd(1111111);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

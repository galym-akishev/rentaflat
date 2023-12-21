<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Amenity;

class CreateController extends Controller
{
    public function __invoke()
    {
        $amenities = Amenity::all();
        return view('advertisement.create', compact('amenities'));
    }
}

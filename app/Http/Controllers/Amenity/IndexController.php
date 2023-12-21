<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Models\Amenity;

class IndexController extends Controller
{
    public function __invoke()
    {
        $amenities = Amenity::all();
        return view('amenity.index', compact('amenities'));
    }
}

<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Models\Amenity;

class ShowController extends Controller
{
    public function __invoke(Amenity $amenity)
    {
        return view('amenity.show', compact('amenity'));
    }
}

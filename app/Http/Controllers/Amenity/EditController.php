<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Models\Amenity;

class EditController extends Controller
{
    public function __invoke(Amenity $amenity)
    {
        return view('amenity.edit', compact('amenity'));
    }
}

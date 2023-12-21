<?php

namespace App\Http\Controllers\Amenity;

use App\Models\Amenity;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $amenities = Amenity::all();
        return view('amenity.index', compact('amenities'));
    }
}

<?php

namespace App\Http\Controllers\Amenity;

use App\Models\Amenity;

class ShowController extends BaseController
{
    public function __invoke(Amenity $amenity)
    {
        return view('amenity.show', compact('amenity'));
    }
}

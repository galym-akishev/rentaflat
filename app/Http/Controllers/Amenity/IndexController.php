<?php

namespace App\Http\Controllers\Amenity;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $amenities = $this->service->getAllAmenities();

        return view('amenity.index', compact('amenities'));
    }
}

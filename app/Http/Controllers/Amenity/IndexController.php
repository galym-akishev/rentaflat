<?php

namespace App\Http\Controllers\Amenity;

use App\Models\Amenity;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $this->authorize('viewAny', Amenity::class);

        $amenities = $this->service->getAllAmenities();

        return view('amenity.index', compact('amenities'));
    }
}

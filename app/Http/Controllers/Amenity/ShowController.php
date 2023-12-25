<?php

namespace App\Http\Controllers\Amenity;

use App\Models\Amenity;

class ShowController extends BaseController
{
    public function __invoke(Amenity $amenity)
    {
        $this->authorize('view', $amenity);

        return view('amenity.show', compact('amenity'));
    }
}

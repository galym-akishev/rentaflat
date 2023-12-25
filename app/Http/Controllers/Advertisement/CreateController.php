<?php

namespace App\Http\Controllers\Advertisement;

use App\Models\Advertisement;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $this->authorize('create', Advertisement::class);

        $amenities = $this->service->getAllAmenities();

        return view('advertisement.create', compact('amenities'));
    }
}

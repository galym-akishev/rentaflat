<?php

namespace App\Http\Controllers\Advertisement;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $amenities = $this->service->getAllAmenities();

        return view('advertisement.create', compact('amenities'));
    }
}

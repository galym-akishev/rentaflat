<?php

namespace App\Http\Controllers\Amenity;

use App\Models\Amenity;

class EditController extends BaseController
{
    public function __invoke(Amenity $amenity)
    {
        return view('amenity.edit', compact('amenity'));
    }
}

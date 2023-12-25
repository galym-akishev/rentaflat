<?php

namespace App\Http\Controllers\Amenity;

use App\Models\Amenity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $this->authorize('create', Amenity::class);

        return view('amenity.create');
    }
}

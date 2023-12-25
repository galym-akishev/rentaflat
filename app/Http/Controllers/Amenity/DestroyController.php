<?php

namespace App\Http\Controllers\Amenity;

use App\Models\Amenity;

class DestroyController extends BaseController
{
    public function __invoke(Amenity $amenity)
    {
        $this->authorize('delete', $amenity);

        $this->service->destroy($amenity);

        return redirect()->route('amenity.index');
    }
}

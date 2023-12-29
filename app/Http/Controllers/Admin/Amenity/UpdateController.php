<?php

namespace App\Http\Controllers\Admin\Amenity;

use App\Http\Requests\Amenity\UpdateRequest;
use App\Models\Amenity;

class UpdateController extends BaseController
{
    public function __invoke(Amenity $amenity, UpdateRequest $request)
    {
        $this->authorize('update', $amenity);

        $data = $request->validated();
        $this->service->update($amenity, $data);

        return redirect()->route('admin.amenity.show', $amenity->id);
    }
}

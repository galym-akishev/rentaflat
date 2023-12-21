<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Amenity;

class EditController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $amenitiesAll = Amenity::all();
        $amenitiesOfAdvertisement = $advertisement->amenities()->get();
        $files = $advertisement->files()->get();
        return view(
            'advertisement.edit',
            compact('advertisement', 'amenitiesAll', 'amenitiesOfAdvertisement', 'files')
        );
    }
}

<?php

namespace App\Http\Controllers\Advertisement;

use App\Models\Advertisement;

class EditController extends BaseController
{
    public function __invoke(Advertisement $advertisement)
    {
        $this->authorize('update', $advertisement);

        $amenitiesAll = $this->service->getAllAmenities();
        $amenitiesOfAdvertisement = $this->service->getAmenitiesOfAdvertisement($advertisement);
        $files = $this->service->getFilesOfAdvertisement($advertisement);

        return view(
            'advertisement.edit',
            compact(
                'advertisement',
                'amenitiesAll',
                'amenitiesOfAdvertisement',
                'files'
            )
        );
    }
}

<?php

namespace App\Http\Controllers\Advertisement;

use App\Models\Advertisement;

class ShowController extends BaseController
{
    public function __invoke(Advertisement $advertisement)
    {
        $this->authorize('view', $advertisement);

        $amenities = $this->service->getAmenitiesOfAdvertisement($advertisement);
        $files = $this->service->getFilesOfAdvertisement($advertisement);
        $advertisementOwner = $this->service->getOwnerOfAdvertisement($advertisement);

        return view(
            'advertisement.show',
            compact(
                'advertisement',
                'amenities',
                'files',
                'advertisementOwner'
            )
        );
    }
}

<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(Advertisement $advertisement)
    {
        $this->authorize('view', $advertisement);

        $amenities = $this->service->getAmenitiesOfAdvertisement($advertisement);
        $files = $this->service->getFilesOfAdvertisement($advertisement);
        $advertisementOwner = $this->service->getOwnerOfAdvertisement($advertisement);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view(
            'admin.advertisement.show',
            compact(
                'advertisement',
                'amenities',
                'files',
                'advertisementOwner',
                'advertisementsCount',
                'amenitiesCount',
                'usersCount',
            )
        );
    }
}

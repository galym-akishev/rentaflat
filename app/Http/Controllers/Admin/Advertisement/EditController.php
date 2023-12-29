<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class EditController extends BaseController
{
    public function __invoke(Advertisement $advertisement)
    {
        $this->authorize('update', $advertisement);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        $publishedStatusesEnum = $this->service->getArrayOfPublishedStatuses();

        return view(
            'admin.advertisement.edit',
            compact(
                'advertisement',
                'advertisementsCount',
                'amenitiesCount',
                'usersCount',
                'publishedStatusesEnum'
            )
        );
    }
}

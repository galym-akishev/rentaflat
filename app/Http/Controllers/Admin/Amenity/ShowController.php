<?php

namespace App\Http\Controllers\Admin\Amenity;

use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(Amenity $amenity)
    {
        $this->authorize('view', $amenity);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view('admin.amenity.show',
            compact(
                'amenity',
                'advertisementsCount',
                'usersCount',
                'amenitiesCount'
            )
        );
    }
}

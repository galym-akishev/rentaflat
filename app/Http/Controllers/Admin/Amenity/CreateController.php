<?php

namespace App\Http\Controllers\Admin\Amenity;

use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $this->authorize('create', Amenity::class);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view('admin.amenity.create',
            compact(
                'advertisementsCount',
                'usersCount',
                'amenitiesCount'
            )
        );
    }
}

<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class ShowController extends BaseController
{
    public function __invoke(User $user)
    {
        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view('admin.user.show',
            compact(
                'user',
                'advertisementsCount',
                'usersCount',
                'amenitiesCount',
            )
        );
    }
}

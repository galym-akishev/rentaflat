<?php

namespace App\Http\Controllers\Home;

use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $advertisements = $this->service->getAllAdvertisementsOfAuthenticatedUser();

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view('home.index',
            compact(
                'advertisements',
                'advertisementsCount',
                'usersCount',
                'amenitiesCount'
            )
        );
    }
}

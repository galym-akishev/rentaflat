<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\User\FilterRequest;
use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = $this->service->makeFilterOnData($data);
        $users = $this->service->getPaginatedUsersWithFilter($filter);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view('admin.user.index',
            compact(
                'users',
                'advertisementsCount',
                'amenitiesCount',
                'usersCount',
            )
        );
    }
}

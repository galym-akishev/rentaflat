<?php

namespace App\Http\Controllers\Admin\User;

use App\Constants\PaginationConstants;
use App\Http\Filters\AdvertisementFilter;
use App\Http\Requests\Advertisement\FilterRequest;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(AdvertisementFilter::class, ['queryParams' => array_filter($data)]);
        $users = User::filter($filter)->paginate(PaginationConstants::USERS_PER_PAGE);

        $advertisementsCount = $this->service->getAdvertisementsCount();
        $usersCount = $this->service->getUsersCount();
        $amenitiesCount = $this->service->getAmenitiesCount();

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
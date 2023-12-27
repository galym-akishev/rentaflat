<?php

namespace App\Http\Controllers\Admin\User;

use App\Enums\UserRolesEnum;
use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class EditController extends BaseController
{
    public function __invoke(User $user)
    {
        $this->authorize('update', $user);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();
        $userRoleCases = array_column(UserRolesEnum::cases(), 'value');

        return view('admin.user.edit',
            compact(
                'user',
                'advertisementsCount',
                'usersCount',
                'amenitiesCount',
                'userRoleCases'
            )
        );
    }
}

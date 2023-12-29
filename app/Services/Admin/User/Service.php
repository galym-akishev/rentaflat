<?php

namespace App\Services\Admin\User;

use App\Constants\PaginationConstants;
use App\Enums\UserRolesEnum;
use App\Http\Filters\UserFilter;
use App\Models\User;

class Service
{
    public function makeFilterOnData(array $data)
    {
        return app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
    }

    public function getPaginatedUsersWithFilter(UserFilter $filter)
    {
        return User::filter($filter)->paginate(PaginationConstants::USERS_PER_PAGE);
    }

    public function getArrayOfUserRoles(): array
    {
        return array_column(UserRolesEnum::cases(), 'value');
    }

    public function update(User $user, $data): void
    {
        $user->update($data);
    }
}

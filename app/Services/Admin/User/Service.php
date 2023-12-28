<?php

namespace App\Services\Admin\User;

use App\Enums\UserRolesEnum;
use App\Models\User;

class Service
{
    public function getArrayOfUserRoles(): array
    {
        return array_column(UserRolesEnum::cases(), 'value');
    }

    public function update(User $user, $data): void
    {
        $user->update($data);
    }
}

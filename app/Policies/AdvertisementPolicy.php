<?php

namespace App\Policies;

use App\Enums\UserRolesEnum;
use App\Models\Advertisement;
use App\Models\User;

class AdvertisementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Advertisement $advertisement): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array(
            $user->role,
            [
                UserRolesEnum::ADMIN->value,
                UserRolesEnum::MODERATOR->value,
                UserRolesEnum::USER->value
            ]
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Advertisement $advertisement): bool
    {
        $isUserEqualToAdvertisementOwner = $user->id === $advertisement->user_id;
        $isUserEqualToModeratorOrAdmin = in_array(
            $user->role,
            [
                UserRolesEnum::ADMIN->value,
                UserRolesEnum::MODERATOR->value,
            ]
        );
        return ($isUserEqualToAdvertisementOwner || $isUserEqualToModeratorOrAdmin);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Advertisement $advertisement): bool
    {
        $isUserEqualToAdvertisementOwner = $user->id === $advertisement->user_id;
        $isUserEqualToModeratorOrAdmin = in_array(
            $user->role,
            [
                UserRolesEnum::ADMIN->value,
                UserRolesEnum::MODERATOR->value,
            ]
        );
        return ($isUserEqualToAdvertisementOwner || $isUserEqualToModeratorOrAdmin);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Advertisement $advertisement): bool
    {
        return in_array(
            $user->role,
            [
                UserRolesEnum::ADMIN->value,
                UserRolesEnum::MODERATOR->value,
            ]
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Advertisement $advertisement): bool
    {
        return in_array(
            $user->role,
            [
                UserRolesEnum::ADMIN->value,
                UserRolesEnum::MODERATOR->value,
            ]
        );
    }
}

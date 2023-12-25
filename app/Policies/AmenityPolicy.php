<?php

namespace App\Policies;

use App\Enums\UserRolesEnum;
use App\Models\Amenity;
use App\Models\User;

class AmenityPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array(
            $user->role,
            [
                UserRolesEnum::ADMIN->value,
                UserRolesEnum::MODERATOR->value
            ]
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Amenity $amenity): bool
    {
        return in_array($user->role, [UserRolesEnum::ADMIN->value]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, [UserRolesEnum::ADMIN->value]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Amenity $amenity): bool
    {
        return in_array($user->role, [UserRolesEnum::ADMIN->value]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Amenity $amenity): bool
    {
        return in_array($user->role, [UserRolesEnum::ADMIN->value]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Amenity $amenity): bool
    {
        return in_array($user->role, [UserRolesEnum::ADMIN->value]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Amenity $amenity): bool
    {
        return in_array($user->role, [UserRolesEnum::ADMIN->value]);
    }
}

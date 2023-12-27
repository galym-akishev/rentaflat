<?php

namespace App\Services\Admin\User;

use App\Models\User;

class Service
{
    public function update(User $user, $data): void
    {
        $user->update($data);
    }
}

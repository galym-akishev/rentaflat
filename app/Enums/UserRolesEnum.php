<?php

namespace App\Enums;

enum UserRolesEnum: string {
    case ADMIN = 'admin';
    case MODERATOR = 'moderator';
    case USER = 'user';
}

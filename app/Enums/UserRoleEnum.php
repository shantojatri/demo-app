<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case SUPER_ADMIN = 'super-admin';
    case ADMIN       = 'admin';
    case CUSTOMER    = 'customer';
}

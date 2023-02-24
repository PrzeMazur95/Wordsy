<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum ExceptionMessages: string
{
    case GENERAL_DB_ERROR = 'Something went wrong with database connection, please contact with admin';
}

<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum JsonResponseMessages: string
{
    case SAVED = "New entity has been saved";
    case NOT_FOUND = 'There is no such entity with provided id';
    case UPDATED = 'This entity has been successfully updated';
}

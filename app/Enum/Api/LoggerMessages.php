<?php

declare(strict_types=1);

namespace App\Enum\Api;

enum LoggerMessages: string
{
    case ALL_WORDS = "Something went wrong when trying to get all words from database through API";
    case STORE_WORD = "Something went wrong when trying save a word through API";
    case UPDATE_WORD = "Something went wrong when trying to update provided word through API";
    case SHOW_WORD = "Something went wrong when trying to get specific word through API";
    case DELETE_WORD = "Something went wrong when trying to delete specific word through API";
    case AMOUNT_OF_WORDS = "Something went wrong when trying to get specific amount of words from database through API";
}

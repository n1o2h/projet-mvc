<?php

namespace App\enums;

class Status
{
    public const PENDING = 0;
    public const VALID = 1;
    public const CANCEL = 2;

    public function all() : array
    {
        return [
            self::PENDING, self::CANCEL, self::VALID
        ];
    }
}
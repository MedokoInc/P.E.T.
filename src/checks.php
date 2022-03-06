<?php

namespace Medoko\Petlocator;

class checks
{
    static function isValidTel(mixed $number): bool|int
    {
        return preg_match('/^+?[0-9]+$/', $number);
    }

    static function isValidName(mixed $number): bool|int
    {
        return preg_match('/^[a-zA-Z\s]+$/', $number);
    }
}


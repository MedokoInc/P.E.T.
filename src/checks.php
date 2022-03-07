<?php

namespace Medoko\Petlocator;

class checks
{
    static function isValidTel($number): bool
    {
        return preg_match('/^\+?[0-9]+$/', $number);
    }

    static function isValidName($name): bool
    {
        return preg_match('/^[a-zA-Z\s]+$/', $name);
    }
}


<?php

namespace Medoko\Petlocator;

use PHPUnit\Framework\TestCase;

class checksTest extends TestCase
{

    public function testIsValidName()
    {
        $this->assertFalse(
            checks::isValidName("9338437")
        );

        $this->assertTrue(
            checks::isValidName("Gary Smith")
        );
    }

    public function testIsValidTel()
    {
        $this->assertTrue(
            checks::isValidTel("+431122333")
        );

        $this->assertTrue(
            checks::isValidTel("06606611766")
        );

        $this->assertFalse(
            checks::isValidTel("thiswillfail")
        );
    }
}

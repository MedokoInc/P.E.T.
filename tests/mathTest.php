<?php


use Medoko\Petlocator\math;
use PHPUnit\Framework\TestCase;

class mathTest extends TestCase
{

    public function testAddIsCorrect() {
        $this->assertEquals(
            math::add(1,1),
            2
        );
    }

    public function testAddIsIncorrect() {
        $this->assertNotEquals(
            math::add(1,1),
            6
        );
    }
}

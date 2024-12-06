<?php

namespace App\Tests\day_1\part_1;

use App\day_1\part_1\DayOne;
use PHPUnit\Framework\TestCase;

class DayOneTest extends TestCase
{
    public function testCompare(): void
    {
        $dayOne = new DayOne();
        $this->assertEquals(0, $dayOne->compare());
    }
}

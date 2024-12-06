<?php

namespace App\Tests\day_1;

use App\day_1\PartOne;
use PHPUnit\Framework\TestCase;

class PartOneTest extends TestCase
{
    public function testCalculateDifferenceSum()
    {
        $dayOne = new PartOne();
        $this->assertEquals(2367773, $dayOne->calculateDifferenceSum());
    }
}

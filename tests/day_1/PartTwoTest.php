<?php

namespace App\Tests\day_1;

use day_1\PartOne;
use day_1\PartTwo;
use PHPUnit\Framework\TestCase;

class PartTwoTest extends TestCase
{
    public function testCalculateDifferenceSum()
    {
        $dayOne = new \day_1\PartTwo();
        $this->assertEquals(21271939, $dayOne->findSimilaritySum());
    }
}

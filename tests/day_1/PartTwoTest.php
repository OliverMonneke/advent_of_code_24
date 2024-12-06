<?php

namespace App\Tests\day_1;

use App\day_1\PartOne;
use App\day_1\PartTwo;
use PHPUnit\Framework\TestCase;

class PartTwoTest extends TestCase
{
    public function testCalculateDifferenceSum()
    {
        $dayOne = new PartTwo();
        $this->assertEquals(21271939, $dayOne->findSimilaritySum());
    }
}

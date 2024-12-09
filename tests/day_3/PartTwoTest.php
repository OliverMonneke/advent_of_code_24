<?php

namespace App\Tests\day_3;

use App\day_3\PartTwo;
use PHPUnit\Framework\TestCase;

class PartTwoTest extends TestCase
{
    public function testOne()
    {
        $dayThree = new PartTwo();
        $dayThree->findMultiplesFromText("xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))");
        $this->assertEquals(48, $dayThree->getResult());
    }
}

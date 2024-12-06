<?php

namespace App\Tests\day_2;

use App\day_2\PartTwo;
use PHPUnit\Framework\TestCase;

class PartTwoTest extends TestCase
{
    public function testOne()
    {
        $dayTwo = new PartTwo();
        $dayTwo->addSequence([7, 6, 4, 2, 1]);
        $this->assertEquals(1, $dayTwo->countSafeSequences());
    }

    public function testTwo()
    {
        $dayTwo = new PartTwo();
        $dayTwo->addSequence([1, 2, 7, 8, 9]);
        $this->assertEquals(0, $dayTwo->countSafeSequences());
    }

    public function testThree()
    {
        $dayTwo = new PartTwo();
        $dayTwo->addSequence([9, 7, 6, 2, 1]);
        $this->assertEquals(0, $dayTwo->countSafeSequences());
    }

    public function testFour()
    {
        $dayTwo = new PartTwo();
        $dayTwo->addSequence([1,3,2,4,5]);
        $this->assertEquals(1, $dayTwo->countSafeSequences());
    }

    public function testFive()
    {
        $dayTwo = new PartTwo();
        $dayTwo->addSequence([8,6,4,4,1]);
        $this->assertEquals(1, $dayTwo->countSafeSequences());

    }

    public function testSix()
    {
        $dayTwo = new PartTwo();
        $dayTwo->addSequence([1,3,6,7,9]);
        $this->assertEquals(1, $dayTwo->countSafeSequences());
    }
}

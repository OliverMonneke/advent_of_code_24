<?php

namespace App\Tests\day_2;

use App\day_2\PartOne;
use PHPUnit\Framework\TestCase;

class PartOneTest extends TestCase
{
    public function testCountSafeSequencesDecreasing()
    {
        $dayTwo = new PartOne();
        $dayTwo->addSequence([7, 6, 4, 2, 1]);
        $this->assertEquals(1, $dayTwo->countSafeSequences());
    }

    public function testCountSafeSequencesIncreasing()
    {
        $dayTwo = new PartOne();
        $dayTwo->addSequence([1, 3, 6, 7, 9]);
        $this->assertEquals(1, $dayTwo->countSafeSequences());
    }

    public function testCountSafeSequencesDecreasingAndIncreasing()
    {
        $dayTwo = new PartOne();
        $dayTwo->addSequence([1, 3, 2, 4, 5]);
        $this->assertEquals(0, $dayTwo->countSafeSequences());
    }

    public function testCountSafeSequencesWithIncreasingJump()
    {
        $dayTwo = new PartOne();
        $dayTwo->addSequence([1, 2, 7, 8, 9]);
        $this->assertEquals(0, $dayTwo->countSafeSequences());
    }

    public function testCountSafeSequencesWithDecreasingJump()
    {
        $dayTwo = new PartOne();
        $dayTwo->addSequence([9, 7, 6, 2, 1]);
        $this->assertEquals(0, $dayTwo->countSafeSequences());
    }

    public function testCountSafeSequencesWithEqualJump()
    {
        $dayTwo = new PartOne();
        $dayTwo->addSequence([8, 6, 4, 4, 1]);
        $this->assertEquals(0, $dayTwo->countSafeSequences());

    }
}

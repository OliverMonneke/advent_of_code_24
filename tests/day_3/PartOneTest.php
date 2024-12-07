<?php

namespace App\Tests\day_3;

use App\day_3\PartOne;
use PHPUnit\Framework\TestCase;

class PartOneTest extends TestCase
{
    public function testOne()
    {
        $dayThree = new PartOne();
        $dayThree->findMultiplesFromText('xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))');
        $this->assertEquals(161, $dayThree->getResult());
    }
}

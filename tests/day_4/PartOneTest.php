<?php

namespace App\Tests\day_4;

use day_4\PartOne;
use PHPUnit\Framework\TestCase;

class PartOneTest extends TestCase
{
    public function testCountXmas()
    {
        $dayOne = new \day_4\PartOne();
        $dayOne->addFields(file_get_contents(__DIR__ . '/input.txt'));
        $this->assertEquals(18, $dayOne->countXmas());
    }
}

<?php

namespace App;

/**
 * Interface Advent
 * @package App
 */
interface AdventInterface
{
    /**
     * @return int
     */
    public function firstPart(): int;

    /**
     * @return int
     */
    public function secondPart(): int;
}

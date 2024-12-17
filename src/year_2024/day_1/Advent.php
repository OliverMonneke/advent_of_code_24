<?php

namespace App\year_2024\day_1;

use App\AdventBase;

class Advent extends AdventBase
{
    /**
     * @var int
     */
    private const int DELIMITER_SPACES = 3;

    /**
     * @var string
     */
    protected string $input_file = __DIR__ . '/input.txt';

    /**
     * @return int
     */
    public function firstPart(): int
    {
        $lines = $this->getInput();

        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            [$leftValue, $rightValue] = explode(str_repeat(' ', self::DELIMITER_SPACES), $line);
            $leftValues[] = (int) $leftValue;
            $rightValues[] = (int) $rightValue;
        }

        sort($leftValues);
        sort($rightValues);

        return array_sum(array_map(fn($left, $right) => abs($left - $right), $leftValues, $rightValues));
    }

    /**
     * @return int
     */
    public function secondPart(): int
    {
        $lines = $this->getInput();
        $sum = 0;

        $left = $right = [];
        foreach ($lines as $line) {
            if (!empty($line)) {
                $lineSplit = explode('   ', $line);
                if (count($lineSplit) >= 2) {
                    $left[] = $lineSplit[0];
                    $right[] = $lineSplit[1];
                }
            }
        }

        $rightCount = array_count_values($right);
        foreach($left as $leftItem) {
            if (isset($rightCount[$leftItem])) {
                $sum += ($rightCount[$leftItem] * $leftItem);
            }
        }

        return $sum;
    }
}

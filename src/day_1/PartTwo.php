<?php

namespace App\day_1;

class PartTwo
{
    public function findSimilaritySum(): int
    {
        $input = file_get_contents(__DIR__ . '/input.txt');
        $lines = explode("\n", $input);
        $sum = 0;
        $left = [];
        $right = [];

        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            $lineSplit = explode('   ', $line);
            $left[] = $lineSplit[0];
            $right[] = $lineSplit[1];
        }

        foreach($left as $leftItem) {
            if (in_array($leftItem, $right)) {
                # count how often does leftItem appear in the right array
                $rightCount = array_count_values($right);
                $sum += ($rightCount[$leftItem] * $leftItem);
            }
        }

        return $sum;
    }
}

$dayTwo = new PartTwo();
# echo $dayTwo->findSimilaritySum();

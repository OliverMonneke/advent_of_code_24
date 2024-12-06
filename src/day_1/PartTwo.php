<?php

namespace App\day_1;

class PartTwo
{
    /**
     * @var string
     */
    private const string INPUT_FILE = __DIR__ . '/input.txt';

    /**
     * @return int
     */
    public function findSimilaritySum(): int
    {
        $lines = $this->getLinesFromFile();
        $sum = 0;

        [$left, $right] = $this->splitLines($lines);

        $rightCount = array_count_values($right);
        foreach($left as $leftItem) {
            if (isset($rightCount[$leftItem])) {
                $sum += ($rightCount[$leftItem] * $leftItem);
            }
        }

        return $sum;
    }

    /**
     * @return array
     */
    private function getLinesFromFile(): array
    {
        $input = file_get_contents(self::INPUT_FILE);
        return explode("\n", trim($input));
    }

    /**
     * @param array $lines
     * @return array
     */
    private function splitLines(array $lines): array
    {
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
        return [$left, $right];
    }
}

$dayTwo = new PartTwo();
# echo $dayTwo->findSimilaritySum();

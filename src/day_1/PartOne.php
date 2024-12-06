<?php

namespace App\day_1;

class PartOne
{
    private array $left = [];
    private array $right = [];

    private const string INPUT_FILE_PATH = __DIR__ . '/input.txt';

    public function calculateDifferenceSum(): int
    {
        $this->parseInputFile();
        sort($this->left);
        sort($this->right);

        $differences = array_map(fn($left, $right) => abs($left - $right), $this->left, $this->right);

        return array_sum($differences);
    }

    private function parseInputFile(): void
    {
        $input = file_get_contents(self::INPUT_FILE_PATH);
        $lines = explode("\n", $input);

        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }
            list($leftValue, $rightValue) = explode('   ', $line);
            $this->left[] = $leftValue;
            $this->right[] = $rightValue;
        }
    }
}

$dayOne = new PartOne();
# echo $dayOne->calculateDifferenceSum();

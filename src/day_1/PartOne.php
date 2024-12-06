<?php

namespace App\day_1;

class PartOne
{
    private array $leftValues = [];
    private array $rightValues = [];
    private const string INPUT_FILE_PATH = __DIR__ . '/input.txt';
    private const int DELIMITER_SPACES = 3;

    public function calculateSumOfDifferences(): int
    {
        $this->loadInputData();
        sort($this->leftValues);
        sort($this->rightValues);

        return array_sum($this->calculateDifferences());
    }

    private function loadInputData(): void
    {
        $lines = $this->readInputFile();
        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }
            [$leftValue, $rightValue] = explode(str_repeat(' ', self::DELIMITER_SPACES), $line);
            $this->leftValues[] = (int)$leftValue;
            $this->rightValues[] = (int)$rightValue;
        }
    }

    private function readInputFile(): array
    {
        $input = file_get_contents(self::INPUT_FILE_PATH);
        return explode("\n", trim($input));
    }

    private function calculateDifferences(): array
    {
        return array_map(fn($left, $right) => abs($left - $right), $this->leftValues, $this->rightValues);
    }
}
# echo $dayOne->calculateDifferenceSum();

<?php

namespace App\day_1;

class PartOne
{
    /**
     * @var array
     */
    private array $leftValues = [];
    /**
     * @var array
     */
    private array $rightValues = [];
    /**
     * @var string
     */
    private const string INPUT_FILE_PATH = __DIR__ . '/input.txt';
    /**
     * @var int
     */
    private const int DELIMITER_SPACES = 3;

    /**
     * @return int
     */
    public function calculateSumOfDifferences(): int
    {
        $this->loadInputData();
        sort($this->leftValues);
        sort($this->rightValues);

        return array_sum($this->calculateDifferences());
    }

    /**
     * @return void
     */
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

    /**
     * @return array
     */
    private function readInputFile(): array
    {
        $input = file_get_contents(self::INPUT_FILE_PATH);
        return explode("\n", trim($input));
    }

    /**
     * @return array
     */
    private function calculateDifferences(): array
    {
        return array_map(fn($left, $right) => abs($left - $right), $this->leftValues, $this->rightValues);
    }
}

# $dayOne = new PartOne();
# echo $dayOne->calculateDifferenceSum();

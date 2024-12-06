<?php

namespace App\day_1\part_1;

class DayOne
{
    private array $left = [];
    private array $right = [];

    public function compare(): int
    {
        $input = file_get_contents(__DIR__ . '/input.txt');
        $lines = explode("\n", $input);
        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            $lineSplit = explode('   ', $line);
            $this->left[] = $lineSplit[0];
            $this->right[] = $lineSplit[1];
        }

        # sort the arrays
        sort($this->left);
        sort($this->right);
        $sum = 0;

        for ($i = 0; $i < count($this->left); $i++) {
            $sum += abs($this->left[$i] - $this->right[$i]);
        }

        return $sum;
    }
}

$dayOne = new DayOne();
echo $dayOne->compare();
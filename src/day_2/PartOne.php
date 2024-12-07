<?php

namespace App\day_2;

class PartOne
{
    /**
     * @var array
     */
    private array $sequences = [];

    /**
     * @param array $sequence
     * @return void
     */
    public function addSequence(array $sequence): void
    {
        $this->sequences[] = $sequence;
    }

    /**
     * @param array $sequence
     * @return bool
     */
    public function isSafe(array $sequence): bool
    {
        if (!$this->hasSafeDifference($sequence)) {
            return false;
        }

        return $this->isConsistentlyIncreasingOrDecreasing($sequence);
    }

    /**
     * @param array $sequence
     * @return bool
     */
    private function hasSafeDifference(array $sequence): bool
    {
        for ($i = 1; $i < count($sequence); $i++) {
            if (abs($sequence[$i] - $sequence[$i - 1]) > 3) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param array $sequence
     * @return bool
     */
    private function isConsistentlyIncreasingOrDecreasing(array $sequence): bool
    {
        $isDecreasing = false;
        $isIncreasing = false;

        for ($i = 1; $i < count($sequence); $i++) {
            if ($sequence[$i] < $sequence[$i - 1]) {
                $isDecreasing = true;
            } elseif ($sequence[$i] > $sequence[$i - 1]) {
                $isIncreasing = true;
            } else {
                return false; // No change means neither increasing nor decreasing
            }
        }

        return $isDecreasing !== $isIncreasing;
    }

    /**
     * @return int
     */
    public function countSafeSequences(): int
    {
        $count = 0;

        foreach ($this->sequences as $sequence) {
            if ($this->isSafe($sequence)) {
                $count++;
            }
        }

        return $count;
    }
}

$dayTwo = new PartOne();
$file = file_get_contents(__DIR__ . '/input.txt');
$lines = explode("\n", $file);
foreach ($lines as $line) {
    if (empty($line)) {
        continue;
    }
    $dayTwo->addSequence(explode(' ', $line));
}

# echo $dayTwo->countSafeSequences();
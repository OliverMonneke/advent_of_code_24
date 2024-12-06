<?php

namespace App\day_2;

class PartTwo
{
    private array $sequence = [];

    public function addSequence(array $sequence): void
    {
        $this->sequence[] = $sequence;
    }

    public function isSafe(array $sequence, bool $fromDampener = false): bool
    {
        $returnValue = true;

        for($i = 0; $i < count($sequence); $i++)
        {
            $current = $sequence[$i];
            $previous = $sequence[$i - 1] ?? null;

            if ($previous === null)
            {
                continue;
            }

            if (abs($current - $previous) > 3)
            {
                $returnValue = false;
            }
        }

        if ($returnValue)
        {
            reset ($this->sequence);

            $decreasing = false;
            $increasing = false;

            for($i = 0; $i < count($sequence); $i++)
            {
                $current = $sequence[$i];
                $previous = $sequence[$i - 1] ?? null;

                if ($previous === null)
                {
                    continue;
                }

                if ($current < $previous)
                {
                    $decreasing = true;
                }
                elseif ($current > $previous)
                {
                    $increasing = true;
                } else {
                    $decreasing = false;
                    $increasing = false;
                    break;
                }
            }

            $returnValue = $decreasing !== $increasing;
        }

        if(!$returnValue && !$fromDampener)
        {
            $returnValue = $this->dampenSequence($sequence);
        }

        return $returnValue;
    }

    private function dampenSequence(array $sequence): bool
    {
        # generate all possible sequences and check if they are safe
        $safe = false;
        $sequences = $this->generateSequences($sequence);

        foreach ($sequences as $sequence)
        {
            if ($this->isSafe($sequence, true))
            {
                $safe = true;
                break;
            }
        }

        return $safe;
    }

    public function countSafeSequences(): int
    {
        $count = 0;

        foreach ($this->sequence as $sequence)
        {
            if ($this->isSafe($sequence))
            {
                $count++;
            }
        }

        return $count;
    }

    private function generateSequences(array $sequence): array
    {
        $sequences = [];
        $sequenceLength = count($sequence);

        for ($i = 0; $i < $sequenceLength; $i++)
        {
            $newSequence = $sequence;
            array_splice($newSequence, $i, 1);
            $sequences[] = $newSequence;
        }

        return $sequences;
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

echo $dayTwo->countSafeSequences().PHP_EOL;

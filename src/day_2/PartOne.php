<?php

namespace App\day_2;

class PartOne
{
    private array $sequence = [];

    public function addSequence(array $sequence): void
    {
        $this->sequence[] = $sequence;
    }

    public function isSafe(array $sequence): bool
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

        return $returnValue;
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
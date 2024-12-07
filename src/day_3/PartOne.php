<?php

namespace App\day_3;

class PartOne
{
    private int|float $result = 0;

    public function multiply($numbers): float|int
    {
        $result = 1;

        foreach ($numbers as $number) {
            $result *= $number;
        }

        $this->result += $result;

        return $this->result;
    }

    public function findMultiplesFromText($text)
    {
        $regex = '/mul\(?(\d*,\d*)\)/';
        preg_match_all($regex, $text, $matches);
        foreach ($matches[1] as $match) {
            $this->multiply(explode(',', $match));
        }
    }

    public function getResult(): float|int
    {
        return $this->result;
    }
}

$dayOne = new PartOne();

$file = file_get_contents(__DIR__ . '/input.txt');
$lines = explode("\n", $file);
foreach ($lines as $line) {
    if (empty($line)) {
        continue;
    }

    $dayOne->findMultiplesFromText($line);
}

echo "result: ".$dayOne->getResult().PHP_EOL;
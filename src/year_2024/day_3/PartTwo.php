<?php

namespace App\2024\day_3 App\2024\day_3;

class PartTwo
{
    private int|float $result = 0;

    public function multiply(array $numbers): void
    {
        $this->result += array_product($numbers);
    }

    public function findMultiplesFromText($text): void
    {
        $regex = "/(mul\(\d{1,3},\d{1,3}\)|do\(\)|don't\(\))/";
        preg_match_all($regex, $text, $matches);

        $skip = false;

        foreach ($matches[0] as $match) {
            if($match === "don't()") {
                $skip = true;
                continue;
            } elseif($match === "do()") {
                $skip = false;
                continue;
            }

            if(!$skip) {
                $m = explode(",", substr($match, 4, -1));
                $this->result += array_product($m);
            }
        }
    }

    public function getResult(): float|int
    {
        return $this->result;
    }
}


$file = file_get_contents(__DIR__ . '/input.txt');

$dayThree = new \day_3\PartTwo();

$dayThree->findMultiplesFromText($file);

echo "result: ".$dayThree->getResult().PHP_EOL;

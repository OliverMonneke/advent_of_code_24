<?php

namespace App\year_2024\day_4;

class PartOne
{
    private int $result = 0;
    private array $fields = [];

    public function addFields(string $playground): void
    {
        # create a map of fields from the file
        $lines = explode("\n", $playground);
        for($i = 0; $i < count($lines); $i++) {
            $cols = str_split($lines[$i]);
            for($j = 0; $j < count($cols); $j++) {
                $this->fields[$i][$j] = $cols[$j];
            }
        }
    }

    /**
     * count how often the word "XMAS" appears in the fields
     * the word can be written in any direction
     * @return int
     */
    public function countXmas(): int
    {
        $word = "XMAS";
        $count = 0;
        $rows = count($this->fields);
        $cols = count($this->fields[0]);
        for($i = 0; $i < $rows; $i++) {
            for($j = 0; $j < $cols; $j++) {
                if($this->fields[$i][$j] == "X") {
                    # check right
                    if($j + strlen($word) <= $cols) {
                        $found = true;
                        for($k = 1; $k < strlen($word); $k++) {
                            if($this->fields[$i][$j + $k] != $word[$k]) {
                                $found = false;
                                break;
                            }
                        }
                        if($found) {
                            $count++;
                        }
                    }
                    # check down
                    if($i + strlen($word) <= $rows) {
                        $found = true;
                        for($k = 1; $k < strlen($word); $k++) {
                            if($this->fields[$i + $k][$j] != $word[$k]) {
                                $found = false;
                                break;
                            }
                        }
                        if($found) {
                            $count++;
                        }
                    }
                    # check diagonal right down
                    if($j + strlen($word) <= $cols && $i + strlen($word) <= $rows) {
                        $found = true;
                        for($k = 1; $k < strlen($word); $k++) {
                            if($this->fields[$i + $k][$j + $k] != $word[$k]) {
                                $found = false;
                                break;
                            }
                        }
                        if($found) {
                            $count++;
                        }
                    }
                    # check diagonal right up
                    if($j + strlen($word) <= $cols && $i - strlen($word) >= 0) {
                        $found = true;
                        for($k = 1; $k < strlen($word); $k++) {
                            if($this->fields[$i - $k][$j + $k] != $word[$k]) {
                                $found = false;
                                break;
                            }
                        }
                        if($found) {
                            $count++;
                        }
                    }
                }
            }
        }
        return $count;
    }
}

$file = file_get_contents(__DIR__ . '/input.txt');
#$dayFour = new PartOne();

# create a map of fields from the file
#$dayFour->addFields($file);

#echo "result: ".$dayFour->countXmas($file).PHP_EOL;

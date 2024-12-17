<?php

namespace App;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Class AdventBase
 * @package App
 */
abstract class AdventBase implements AdventInterface
{
    /**
     * @var string
     */
    protected string $input_file = '';

    /**
     * @var string
     */
    protected string $input = '';

    /**
     * AdventBase constructor.
     */
    public function __construct()
    {
        $this->readInput();
    }

    /**
     * @return void
     */
    private function readInput(): void
    {
        $this->input = file_get_contents($this->input_file);
    }

    /**
     * @param bool $lineByLine
     * @return string|array
     */
    protected function getInput(bool $lineByLine = true): string|array
    {
        if ($lineByLine) {
            return $this->getLines();
        } else {
            return $this->input;
        }
    }

    /**
     * @return array
     */
    private function getLines(): array
    {
        return explode("\n", trim($this->input));
    }
}

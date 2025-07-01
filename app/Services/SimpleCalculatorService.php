<?php

namespace App\Services;

class SimpleCalculatorService implements CalculatorService
{
    public function count(int $a, int $b): string
    {
        return (string)($a + $b);
    }
}
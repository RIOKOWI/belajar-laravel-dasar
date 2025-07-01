<?php

namespace App\Services;

interface CalculatorService
{
    public function count(int $a, int $b): string;
}
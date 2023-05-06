<?php

namespace App\LearnPhp\Type;

class IntegerType
{
    public function returnIntegerZero(): int
    {
        return 0;
    }

    public function returnIntegerGreaterThan0(): int
    {
        return 1;
    }

    public function returnIntegerLessThan0(): int
    {
        return -1;
    }
}

<?php

namespace App\LearnPhp\Type;

class FloatType
{
    public function returnFloatZero(): float
    {
        return 0.0;
    }

    public function returnFloatGreaterZero(): float
    {
        return 0.1;
    }

    public function returnFloatLessThanZero(): float
    {
        return -0.1;
    }
}

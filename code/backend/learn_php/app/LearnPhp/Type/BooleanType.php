<?php

namespace App\LearnPhp\Type;

class BooleanType
{
    public function returnTrue(): true
    {
        return true;
    }

    public function returnFalse(): false
    {
        return false;
    }
}

<?php

namespace App\LearnPhp\Type;

class StringType
{
    public function returnStringContainHelloIgnoringCase(): string
    {
        return 'hello';
    }

    public function returnStringContainDollarSign(): string
    {
        return '$';
    }

    public function returnStringContainLinefeed(): string
    {
        return "\n";
    }

    public function returnStringContainCarriageReturn(): string
    {
        return "\r";
    }

    public function returnEmptyString(): string
    {
        return '';
    }

    public function combineStringWithSeparator(string $firstString, string $secondString, string $separator): string
    {
        return $firstString.$separator.$secondString;
    }
}

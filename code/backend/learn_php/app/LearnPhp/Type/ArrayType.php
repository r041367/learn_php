<?php

namespace App\LearnPhp\Type;

class ArrayType
{
    public function returnAnyArray(): array
    {
        return [];
    }

    public function returnArrayHasKeyNamedFoo(): array
    {
        return ['Foo' => 'Foo'];
    }

    public function returnArrayContainIntegerZero(): array
    {
        return [0];
    }

    public function returnArrayOfSizeIsTwoContainsOnlyIntegers(): array
    {
        return [1, 2];
    }

    public function addElementIntoArray(array &$array, int $int): void
    {
        $array[] = $int;
    }

    public function removeElementByKeyInArray(array &$array, string $key): void
    {
        unset($array[$key]);
    }

    public function getValueByKey(array $array, string $key): mixed
    {
        return $array[$key];
    }
}

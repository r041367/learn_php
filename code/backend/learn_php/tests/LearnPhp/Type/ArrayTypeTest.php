<?php

namespace Tests\LearnPhp\Type;

use App\LearnPhp\Type\ArrayType;
use PHPUnit\Framework\TestCase;

class ArrayTypeTest extends TestCase
{
    public function test_ReturnAnyArray_ArrayGot(): void
    {
        $arrayType = new ArrayType();
        $this->assertIsArray($arrayType->returnAnyArray());
    }

    public function test_ReturnArrayHasKeyNamedFoo_ArrayGot(): void
    {
        $arrayType = new ArrayType();
        $this->assertArrayHasKey('Foo', $arrayType->returnArrayHasKeyNamedFoo());
    }

    public function test_ReturnArrayContainIntegerZero_ArrayGot(): void
    {
        $arrayType = new ArrayType();
        $this->assertContains(0, $arrayType->returnArrayContainIntegerZero());
    }

    public function test_ReturnArrayOfSizeIsTwoContainsOnlyIntegers_ArrayGot(): void
    {
        $arrayType = new ArrayType();
        $actual = $arrayType->returnArrayOfSizeIsTwoContainsOnlyIntegers();
        $this->assertContainsOnly('int', $actual);
        $this->assertCount(2, $actual);
    }

    public function test_AddElementIntoArray_ArrayGot(): void
    {
        $arrayType = new ArrayType();
        $actual = [];
        $arrayType->addElementIntoArray($actual, 0);

        $this->assertContains(0, $actual);
        $this->assertContainsOnly('int', $actual);
        $this->assertCount(1, $actual);
    }

    public function test_RemoveElementByKeyInArray_ArrayValueGot(): void
    {
        $arrayType = new ArrayType();
        $key = 'foo';
        $actual = [$key => 1];
        $arrayType->removeElementByKeyInArray($actual, $key);
        $this->assertCount(0, $actual);
    }

    public function test_GetArrayValueByKey_ArrayGot(): void
    {
        $arrayType = new ArrayType();
        $key = 'age';
        $value = 18;
        $array = [$key => $value];
        $this->assertSame($value, $arrayType->getValueByKey($array, $key));
    }
}

<?php

namespace Tests\LearnPhp\Type;

use App\LearnPhp\Type\FloatType;
use PHPUnit\Framework\TestCase;

class FloatTypeTest extends TestCase
{
    public function test_ReturnFloatZero_ZeroGot(): void
    {
        $floatType = new FloatType();
        $this->assertIsFloat($floatType->returnFloatZero());
    }

    public function test_ReturnFloatGreaterThanZero_ZeroGot(): void
    {
        $floatType = new FloatType();
        $this->assertIsFloat($floatType->returnFloatGreaterZero());
        $this->assertGreaterThan(0, $floatType->returnFloatGreaterZero());
    }

    public function test_ReturnFloatLessThanZero_ZeroGot(): void
    {
        $floatType = new FloatType();
        $this->assertIsFloat($floatType->returnFloatLessThanZero());
        $this->assertLessThan(0, $floatType->returnFloatLessThanZero());
    }
}

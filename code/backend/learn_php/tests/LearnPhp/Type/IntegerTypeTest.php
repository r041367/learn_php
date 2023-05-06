<?php

namespace Tests\LearnPhp\Type;

use App\LearnPhp\Type\IntegerType;
use PHPUnit\Framework\TestCase;

class IntegerTypeTest extends TestCase
{
    public function test_ReturnZero_ZeroGot(): void
    {
        $typePracticeQuestion = new IntegerType();
        $this->assertEquals(0, $typePracticeQuestion->returnIntegerZero());
        $this->assertIsInt($typePracticeQuestion->returnIntegerZero());
    }

    public function test_ReturnIntegerGreaterThan0_IntegerGot(): void
    {
        $typePracticeQuestion = new IntegerType();
        $this->assertGreaterThan(0, $typePracticeQuestion->returnIntegerGreaterThan0());
        $this->assertIsInt($typePracticeQuestion->returnIntegerGreaterThan0());
    }

    public function test_ReturnIntegerLessThan0_IntegerGot(): void
    {
        $typePracticeQuestion = new IntegerType();
        $this->assertLessThan(0, $typePracticeQuestion->returnIntegerLessThan0());
        $this->assertIsInt($typePracticeQuestion->returnIntegerLessThan0());
    }
}

<?php

namespace Tests\LearnPhp\Type;

use App\LearnPhp\Type\BooleanType;
use PHPUnit\Framework\TestCase;

class BooleanTypeTest extends TestCase
{
    public function test_ResultTrue_TrueGot(): void
    {
        $typePracticeQuestion = new BooleanType();
        $this->assertTrue($typePracticeQuestion->returnTrue());
    }

    public function test_ResultFalse_FalseGot(): void
    {
        $typePracticeQuestion = new BooleanType();
        $this->assertFalse($typePracticeQuestion->returnFalse());
    }
}

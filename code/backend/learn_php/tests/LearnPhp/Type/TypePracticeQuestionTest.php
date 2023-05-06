<?php

namespace Tests\LearnPhp\Type;

use App\LearnPhp\Type\TypePracticeQuestion;
use PHPUnit\Framework\TestCase;

class TypePracticeQuestionTest extends TestCase
{
    public function test_ResultNull_NullGot(): void
    {
        $typePracticeQuestion = new TypePracticeQuestion();
        $this->assertNull($typePracticeQuestion->returnNull());
    }
    public function test_ResultTrue_TrueGot(): void
    {
        $typePracticeQuestion = new TypePracticeQuestion();
        $this->assertTrue($typePracticeQuestion->returnTrue());
    }
    public function test_ResultFalse_FalseGot(): void
    {
        $typePracticeQuestion = new TypePracticeQuestion();
        $this->assertFalse($typePracticeQuestion->returnFalse());
    }
    public function test_ResultInteger_IntegerGot(): void
    {
        $typePracticeQuestion = new TypePracticeQuestion();
        $this->assertIsInt($typePracticeQuestion->returnInteger());
    }
}

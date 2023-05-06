<?php

namespace Tests\LearnPhp\Type;

use App\LearnPhp\Type\NullType;
use PHPUnit\Framework\TestCase;

class NullTypeTest extends TestCase
{
    public function test_ReturnNull_NullGot(): void
    {
        $typePracticeQuestion = new NullType();
        $this->assertNull($typePracticeQuestion->returnNull());
    }
}

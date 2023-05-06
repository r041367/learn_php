<?php

namespace Tests\LearnPhp\Type;

use App\LearnPhp\Type\StringType;
use PHPUnit\Framework\TestCase;

class StringTypeTest extends TestCase
{
    public function test_ReturnStringContainsHello_StringGot(): void
    {
        $stringType = new StringType();
        $this->assertStringContainsStringIgnoringCase('hello', $stringType->returnStringContainHelloIgnoringCase());
    }

    public function test_ReturnStringContainDollarSign_StringGot(): void
    {
        $stringType = new StringType();
        $this->assertStringContainsStringIgnoringCase('$', $stringType->returnStringContainDollarSign());
    }

    public function test_ReturnStringContainLinefeed_StringGot(): void
    {
        $stringType = new StringType();
        $this->assertStringContainsString("\n", $stringType->returnStringContainLinefeed());
    }

    public function test_ReturnStringContainCarriageReturn_StringGot(): void
    {
        $stringType = new StringType();
        $this->assertStringContainsString("\r", $stringType->returnStringContainCarriageReturn());
    }

    public function test_ReturnEmptyString_StringGot(): void
    {
        $stringType = new StringType();
        $this->assertStringContainsString('', $stringType->returnEmptyString());
    }

    public function test_ReturnCombineResult_StringGot(): void
    {
        $stringType = new StringType();
        $this->assertSame('Hello world', $stringType->combineStringWithSeparator('Hello', 'world', ' '));
    }
}

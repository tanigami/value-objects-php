<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class HttpMethodTest extends TestCase
{
    public function testEqualsReturnsTrueIfHttpMethodsAreSame()
    {
        $this->assertTrue(HttpMethod::get()->equals(HttpMethod::get()));
        $this->assertTrue(HttpMethod::head()->equals(HttpMethod::head()));
        $this->assertTrue(HttpMethod::post()->equals(HttpMethod::post()));
        $this->assertTrue(HttpMethod::put()->equals(HttpMethod::put()));
        $this->assertTrue(HttpMethod::delete()->equals(HttpMethod::delete()));
        $this->assertTrue(HttpMethod::connect()->equals(HttpMethod::connect()));
        $this->assertTrue(HttpMethod::options()->equals(HttpMethod::options()));
        $this->assertTrue(HttpMethod::trace()->equals(HttpMethod::trace()));
        $this->assertTrue(HttpMethod::patch()->equals(HttpMethod::patch()));
    }

    public function testToStringReturnsHttpMethodName()
    {
        $this->assertSame('GET', HttpMethod::get()->toString());
        $this->assertSame('HEAD', HttpMethod::head()->toString());
        $this->assertSame('POST', HttpMethod::post()->toString());
        $this->assertSame('PUT', HttpMethod::put()->toString());
        $this->assertSame('DELETE', HttpMethod::delete()->toString());
        $this->assertSame('CONNECT', HttpMethod::connect()->toString());
        $this->assertSame('OPTIONS', HttpMethod::options()->toString());
        $this->assertSame('TRACE', HttpMethod::trace()->toString());
        $this->assertSame('PATCH', HttpMethod::patch()->toString());
    }
}

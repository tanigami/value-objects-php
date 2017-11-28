<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage Invalid URL: this_is_not_url
     */
    public function testConstructorReturnsExceptionIfUrlIsInvalid()
    {
        new Url('this_is_not_url');
    }

    public function testGetterReturnsValueString()
    {
        $this->assertSame('https://tanigami.wtf', (new Url('https://tanigami.wtf'))->url());
    }

    public function testEquelsReturnsTrueIfUrlsAreSame()
    {
        $this->assertTrue((new Url('https://tanigami.wtf'))->equals(new Url('https://tanigami.wtf')));
        $this->assertFalse((new Url('https://tanigami.wtf'))->equals(new Url('https://google.com')));
    }
}

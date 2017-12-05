<?php

namespace Tanigami\ValueObjects\Geo\Japan;

use PHPUnit\Framework\TestCase;

class PrefectureSuffixTest extends TestCase
{
    public function testFactoryMethods()
    {
        $this->assertSame('to', PrefectureSuffix::to()->name());
        $this->assertSame('都', PrefectureSuffix::to()->kanjiName());
        $this->assertSame('do', PrefectureSuffix::do()->name());
        $this->assertSame('道', PrefectureSuffix::do()->kanjiName());
        $this->assertSame('fu', PrefectureSuffix::fu()->name());
        $this->assertSame('府', PrefectureSuffix::fu()->kanjiName());
        $this->assertSame('ken', PrefectureSuffix::ken()->name());
        $this->assertSame('県', PrefectureSuffix::ken()->kanjiName());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage Cannot call static method: foo
     */
    public function testInvalidFactoryMethod()
    {
        PrefectureSuffix::foo();
    }
}
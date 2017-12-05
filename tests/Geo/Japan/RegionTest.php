<?php

namespace Tanigami\ValueObjects\Geo\Japan;

use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    public function testFactoryMethods()
    {
        $this->assertSame('Hokkaido', Region::hokkaido()->name());
        $this->assertSame('北海道', Region::hokkaido()->kanjiName());
        $this->assertSame('Tohoku', Region::tohoku()->name());
        $this->assertSame('東北', Region::tohoku()->kanjiName());
        $this->assertSame('Kanto', Region::kanto()->name());
        $this->assertSame('関東', Region::kanto()->kanjiName());
        $this->assertSame('Chubu', Region::chubu()->name());
        $this->assertSame('中部', Region::chubu()->kanjiName());
        $this->assertSame('Kansai', Region::kansai()->name());
        $this->assertSame('関西', Region::kansai()->kanjiName());
        $this->assertSame('Chugoku', Region::chugoku()->name());
        $this->assertSame('中国', Region::chugoku()->kanjiName());
        $this->assertSame('Shikoku', Region::shikoku()->name());
        $this->assertSame('四国', Region::shikoku()->kanjiName());
        $this->assertSame('Kyushu', Region::kyushu()->name());
        $this->assertSame('九州', Region::kyushu()->kanjiName());
        $this->assertSame('Okinawa', Region::okinawa()->name());
        $this->assertSame('沖縄', Region::okinawa()->kanjiName());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage Cannot call static method: tokyo
     */
    public function testInvalidFactoryMethod()
    {
        Region::tokyo();
    }

    public function testFromName()
    {
        $this->assertTrue(Region::fromName('Hokkaido')->equals(Region::hokkaido()));
        $this->assertTrue(Region::fromName('TOHOKU')->equals(Region::tohoku()));
        $this->assertTrue(Region::fromName('kanto')->equals(Region::kanto()));
        $this->assertTrue(Region::fromName('chuBu')->equals(Region::chubu()));
        $this->assertTrue(Region::fromName('kanSai')->equals(Region::kansai()));
        $this->assertTrue(Region::fromName('ChuGoKu')->equals(Region::chugoku()));
        $this->assertTrue(Region::fromName('shiKoKu')->equals(Region::shikoku()));
        $this->assertTrue(Region::fromName('kYusHu')->equals(Region::kyushu()));
        $this->assertTrue(Region::fromName('okiNawa')->equals(Region::okinawa()));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid region name: Tokyo
     */
    public function testFromNameWithInvalidValue()
    {
        Region::fromName('Tokyo');
    }

    public function testFromKanjiName()
    {
        $this->assertTrue(Region::fromKanjiName('北海道')->equals(Region::hokkaido()));
        $this->assertTrue(Region::fromKanjiName('東北')->equals(Region::tohoku()));
        $this->assertTrue(Region::fromKanjiName('関東')->equals(Region::kanto()));
        $this->assertTrue(Region::fromKanjiName('中部')->equals(Region::chubu()));
        $this->assertTrue(Region::fromKanjiName('関西')->equals(Region::kansai()));
        $this->assertTrue(Region::fromKanjiName('中国')->equals(Region::chugoku()));
        $this->assertTrue(Region::fromKanjiName('四国')->equals(Region::shikoku()));
        $this->assertTrue(Region::fromKanjiName('九州')->equals(Region::kyushu()));
        $this->assertTrue(Region::fromKanjiName('沖縄')->equals(Region::okinawa()));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid region name in kanji: 東京
     */
    public function testFromKanjiNameWithInvalidValue()
    {
        Region::fromKanjiName('東京');
    }
}
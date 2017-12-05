<?php

namespace Tanigami\ValueObjects\Geo\Japan;

use PHPUnit\Framework\TestCase;

class PrefectureTest extends TestCase
{
    public function testFactoryMethods()
    {
        $this->assertSame('JP-01', Prefecture::hokkaido()->isoCode());
        $this->assertSame('Hokkaido', Prefecture::hokkaido()->suffixedName());
        $this->assertSame('北海道', Prefecture::hokkaido()->suffixedKanjiName());
        $this->assertTrue(Prefecture::hokkaido()->region()->equals(Region::hokkaido()));

        $this->assertSame('JP-02', Prefecture::aomori()->isoCode());
        $this->assertSame('Aomori-ken', Prefecture::aomori()->suffixedName());
        $this->assertSame('青森県', Prefecture::aomori()->suffixedKanjiName());
        $this->assertTrue(Prefecture::aomori()->region()->equals(Region::tohoku()));

        $this->assertSame('JP-03', Prefecture::iwate()->isoCode());
        $this->assertSame('Iwate-ken', Prefecture::iwate()->suffixedName());
        $this->assertSame('岩手県', Prefecture::iwate()->suffixedKanjiName());
        $this->assertTrue(Prefecture::iwate()->region()->equals(Region::tohoku()));

        $this->assertSame('JP-04', Prefecture::miyagi()->isoCode());
        $this->assertSame('Miyagi-ken', Prefecture::miyagi()->suffixedName());
        $this->assertSame('宮城県', Prefecture::miyagi()->suffixedKanjiName());
        $this->assertTrue(Prefecture::miyagi()->region()->equals(Region::tohoku()));

        $this->assertSame('JP-05', Prefecture::akita()->isoCode());
        $this->assertSame('Akita-ken', Prefecture::akita()->suffixedName());
        $this->assertSame('秋田県', Prefecture::akita()->suffixedKanjiName());
        $this->assertTrue(Prefecture::akita()->region()->equals(Region::tohoku()));

        $this->assertSame('JP-06', Prefecture::yamagata()->isoCode());
        $this->assertSame('Yamagata-ken', Prefecture::yamagata()->suffixedName());
        $this->assertSame('山形県', Prefecture::yamagata()->suffixedKanjiName());
        $this->assertTrue(Prefecture::yamagata()->region()->equals(Region::tohoku()));

        $this->assertSame('JP-07', Prefecture::fukushima()->isoCode());
        $this->assertSame('Fukushima-ken', Prefecture::fukushima()->suffixedName());
        $this->assertSame('福島県', Prefecture::fukushima()->suffixedKanjiName());
        $this->assertTrue(Prefecture::fukushima()->region()->equals(Region::tohoku()));

        $this->assertSame('JP-08', Prefecture::ibaraki()->isoCode());
        $this->assertSame('Ibaraki-ken', Prefecture::ibaraki()->suffixedName());
        $this->assertSame('茨城県', Prefecture::ibaraki()->suffixedKanjiName());
        $this->assertTrue(Prefecture::ibaraki()->region()->equals(Region::kanto()));

        $this->assertSame('JP-09', Prefecture::tochigi()->isoCode());
        $this->assertSame('Tochigi-ken', Prefecture::tochigi()->suffixedName());
        $this->assertSame('栃木県', Prefecture::tochigi()->suffixedKanjiName());
        $this->assertTrue(Prefecture::tochigi()->region()->equals(Region::kanto()));

        $this->assertSame('JP-10', Prefecture::gunma()->isoCode());
        $this->assertSame('Gunma-ken', Prefecture::gunma()->suffixedName());
        $this->assertSame('群馬県', Prefecture::gunma()->suffixedKanjiName());
        $this->assertTrue(Prefecture::gunma()->region()->equals(Region::kanto()));

        $this->assertSame('JP-11', Prefecture::saitama()->isoCode());
        $this->assertSame('Saitama-ken', Prefecture::saitama()->suffixedName());
        $this->assertSame('埼玉県', Prefecture::saitama()->suffixedKanjiName());
        $this->assertTrue(Prefecture::saitama()->region()->equals(Region::kanto()));

        $this->assertSame('JP-12', Prefecture::chiba()->isoCode());
        $this->assertSame('Chiba-ken', Prefecture::chiba()->suffixedName());
        $this->assertSame('千葉県', Prefecture::chiba()->suffixedKanjiName());
        $this->assertTrue(Prefecture::chiba()->region()->equals(Region::kanto()));

        $this->assertSame('JP-13', Prefecture::tokyo()->isoCode());
        $this->assertSame('Tokyo-to', Prefecture::tokyo()->suffixedName());
        $this->assertSame('東京都', Prefecture::tokyo()->suffixedKanjiName());
        $this->assertTrue(Prefecture::tokyo()->region()->equals(Region::kanto()));

        $this->assertSame('JP-14', Prefecture::kanagawa()->isoCode());
        $this->assertSame('Kanagawa-ken', Prefecture::kanagawa()->suffixedName());
        $this->assertSame('神奈川県', Prefecture::kanagawa()->suffixedKanjiName());
        $this->assertTrue(Prefecture::kanagawa()->region()->equals(Region::kanto()));

        $this->assertSame('JP-15', Prefecture::niigata()->isoCode());
        $this->assertSame('Niigata-ken', Prefecture::niigata()->suffixedName());
        $this->assertSame('新潟県', Prefecture::niigata()->suffixedKanjiName());
        $this->assertTrue(Prefecture::niigata()->region()->equals(Region::chubu()));

        $this->assertSame('JP-16', Prefecture::toyama()->isoCode());
        $this->assertSame('Toyama-ken', Prefecture::toyama()->suffixedName());
        $this->assertSame('富山県', Prefecture::toyama()->suffixedKanjiName());
        $this->assertTrue(Prefecture::toyama()->region()->equals(Region::chubu()));

        $this->assertSame('JP-17', Prefecture::ishikawa()->isoCode());
        $this->assertSame('Ishikawa-ken', Prefecture::ishikawa()->suffixedName());
        $this->assertSame('石川県', Prefecture::ishikawa()->suffixedKanjiName());
        $this->assertTrue(Prefecture::ishikawa()->region()->equals(Region::chubu()));

        $this->assertSame('JP-18', Prefecture::fukui()->isoCode());
        $this->assertSame('Fukui-ken', Prefecture::fukui()->suffixedName());
        $this->assertSame('福井県', Prefecture::fukui()->suffixedKanjiName());
        $this->assertTrue(Prefecture::fukui()->region()->equals(Region::chubu()));

        $this->assertSame('JP-19', Prefecture::yamanashi()->isoCode());
        $this->assertSame('Yamanashi-ken', Prefecture::yamanashi()->suffixedName());
        $this->assertSame('山梨県', Prefecture::yamanashi()->suffixedKanjiName());
        $this->assertTrue(Prefecture::yamanashi()->region()->equals(Region::chubu()));

        $this->assertSame('JP-20', Prefecture::nagano()->isoCode());
        $this->assertSame('Nagano-ken', Prefecture::nagano()->suffixedName());
        $this->assertSame('長野県', Prefecture::nagano()->suffixedKanjiName());
        $this->assertTrue(Prefecture::nagano()->region()->equals(Region::chubu()));

        $this->assertSame('JP-21', Prefecture::gifu()->isoCode());
        $this->assertSame('Gifu-ken', Prefecture::gifu()->suffixedName());
        $this->assertSame('岐阜県', Prefecture::gifu()->suffixedKanjiName());
        $this->assertTrue(Prefecture::gifu()->region()->equals(Region::chubu()));

        $this->assertSame('JP-22', Prefecture::shizuoka()->isoCode());
        $this->assertSame('Shizuoka-ken', Prefecture::shizuoka()->suffixedName());
        $this->assertSame('静岡県', Prefecture::shizuoka()->suffixedKanjiName());
        $this->assertTrue(Prefecture::shizuoka()->region()->equals(Region::chubu()));

        $this->assertSame('JP-23', Prefecture::aichi()->isoCode());
        $this->assertSame('Aichi-ken', Prefecture::aichi()->suffixedName());
        $this->assertSame('愛知県', Prefecture::aichi()->suffixedKanjiName());
        $this->assertTrue(Prefecture::aichi()->region()->equals(Region::chubu()));

        $this->assertSame('JP-24', Prefecture::mie()->isoCode());
        $this->assertSame('Mie-ken', Prefecture::mie()->suffixedName());
        $this->assertSame('三重県', Prefecture::mie()->suffixedKanjiName());
        $this->assertTrue(Prefecture::mie()->region()->equals(Region::kansai()));

        $this->assertSame('JP-25', Prefecture::shiga()->isoCode());
        $this->assertSame('Shiga-ken', Prefecture::shiga()->suffixedName());
        $this->assertSame('滋賀県', Prefecture::shiga()->suffixedKanjiName());
        $this->assertTrue(Prefecture::shiga()->region()->equals(Region::kansai()));

        $this->assertSame('JP-26', Prefecture::kyoto()->isoCode());
        $this->assertSame('Kyoto-fu', Prefecture::kyoto()->suffixedName());
        $this->assertSame('京都府', Prefecture::kyoto()->suffixedKanjiName());
        $this->assertTrue(Prefecture::kyoto()->region()->equals(Region::kansai()));

        $this->assertSame('JP-27', Prefecture::osaka()->isoCode());
        $this->assertSame('Osaka-fu', Prefecture::osaka()->suffixedName());
        $this->assertSame('大阪府', Prefecture::osaka()->suffixedKanjiName());
        $this->assertTrue(Prefecture::osaka()->region()->equals(Region::kansai()));

        $this->assertSame('JP-28', Prefecture::hyogo()->isoCode());
        $this->assertSame('Hyogo-ken', Prefecture::hyogo()->suffixedName());
        $this->assertSame('兵庫県', Prefecture::hyogo()->suffixedKanjiName());
        $this->assertTrue(Prefecture::hyogo()->region()->equals(Region::kansai()));

        $this->assertSame('JP-29', Prefecture::nara()->isoCode());
        $this->assertSame('Nara-ken', Prefecture::nara()->suffixedName());
        $this->assertSame('奈良県', Prefecture::nara()->suffixedKanjiName());
        $this->assertTrue(Prefecture::nara()->region()->equals(Region::kansai()));

        $this->assertSame('JP-30', Prefecture::wakayama()->isoCode());
        $this->assertSame('Wakayama-ken', Prefecture::wakayama()->suffixedName());
        $this->assertSame('和歌山県', Prefecture::wakayama()->suffixedKanjiName());
        $this->assertTrue(Prefecture::wakayama()->region()->equals(Region::kansai()));

        $this->assertSame('JP-31', Prefecture::tottori()->isoCode());
        $this->assertSame('Tottori-ken', Prefecture::tottori()->suffixedName());
        $this->assertSame('鳥取県', Prefecture::tottori()->suffixedKanjiName());
        $this->assertTrue(Prefecture::tottori()->region()->equals(Region::chugoku()));

        $this->assertSame('JP-32', Prefecture::shimane()->isoCode());
        $this->assertSame('Shimane-ken', Prefecture::shimane()->suffixedName());
        $this->assertSame('島根県', Prefecture::shimane()->suffixedKanjiName());
        $this->assertTrue(Prefecture::shimane()->region()->equals(Region::chugoku()));

        $this->assertSame('JP-33', Prefecture::okayama()->isoCode());
        $this->assertSame('Okayama-ken', Prefecture::okayama()->suffixedName());
        $this->assertSame('岡山県', Prefecture::okayama()->suffixedKanjiName());
        $this->assertTrue(Prefecture::okayama()->region()->equals(Region::chugoku()));

        $this->assertSame('JP-34', Prefecture::hiroshima()->isoCode());
        $this->assertSame('Hiroshima-ken', Prefecture::hiroshima()->suffixedName());
        $this->assertSame('広島県', Prefecture::hiroshima()->suffixedKanjiName());
        $this->assertTrue(Prefecture::hiroshima()->region()->equals(Region::chugoku()));

        $this->assertSame('JP-35', Prefecture::yamaguchi()->isoCode());
        $this->assertSame('Yamaguchi-ken', Prefecture::yamaguchi()->suffixedName());
        $this->assertSame('山口県', Prefecture::yamaguchi()->suffixedKanjiName());
        $this->assertTrue(Prefecture::yamaguchi()->region()->equals(Region::chugoku()));

        $this->assertSame('JP-36', Prefecture::tokushima()->isoCode());
        $this->assertSame('Tokushima-ken', Prefecture::tokushima()->suffixedName());
        $this->assertSame('徳島県', Prefecture::tokushima()->suffixedKanjiName());
        $this->assertTrue(Prefecture::tokushima()->region()->equals(Region::shikoku()));

        $this->assertSame('JP-37', Prefecture::kagawa()->isoCode());
        $this->assertSame('Kagawa-ken', Prefecture::kagawa()->suffixedName());
        $this->assertSame('香川県', Prefecture::kagawa()->suffixedKanjiName());
        $this->assertTrue(Prefecture::kagawa()->region()->equals(Region::shikoku()));

        $this->assertSame('JP-38', Prefecture::ehime()->isoCode());
        $this->assertSame('Ehime-ken', Prefecture::ehime()->suffixedName());
        $this->assertSame('愛媛県', Prefecture::ehime()->suffixedKanjiName());
        $this->assertTrue(Prefecture::ehime()->region()->equals(Region::shikoku()));

        $this->assertSame('JP-39', Prefecture::kochi()->isoCode());
        $this->assertSame('Kochi-ken', Prefecture::kochi()->suffixedName());
        $this->assertSame('高知県', Prefecture::kochi()->suffixedKanjiName());
        $this->assertTrue(Prefecture::kochi()->region()->equals(Region::shikoku()));

        $this->assertSame('JP-40', Prefecture::fukuoka()->isoCode());
        $this->assertSame('Fukuoka-ken', Prefecture::fukuoka()->suffixedName());
        $this->assertSame('福岡県', Prefecture::fukuoka()->suffixedKanjiName());
        $this->assertTrue(Prefecture::fukuoka()->region()->equals(Region::kyushu()));

        $this->assertSame('JP-41', Prefecture::saga()->isoCode());
        $this->assertSame('Saga-ken', Prefecture::saga()->suffixedName());
        $this->assertSame('佐賀県', Prefecture::saga()->suffixedKanjiName());
        $this->assertTrue(Prefecture::saga()->region()->equals(Region::kyushu()));

        $this->assertSame('JP-42', Prefecture::nagasaki()->isoCode());
        $this->assertSame('Nagasaki-ken', Prefecture::nagasaki()->suffixedName());
        $this->assertSame('長崎県', Prefecture::nagasaki()->suffixedKanjiName());
        $this->assertTrue(Prefecture::nagasaki()->region()->equals(Region::kyushu()));

        $this->assertSame('JP-43', Prefecture::kumamoto()->isoCode());
        $this->assertSame('Kumamoto-ken', Prefecture::kumamoto()->suffixedName());
        $this->assertSame('熊本県', Prefecture::kumamoto()->suffixedKanjiName());
        $this->assertTrue(Prefecture::kumamoto()->region()->equals(Region::kyushu()));

        $this->assertSame('JP-44', Prefecture::oita()->isoCode());
        $this->assertSame('Oita-ken', Prefecture::oita()->suffixedName());
        $this->assertSame('大分県', Prefecture::oita()->suffixedKanjiName());
        $this->assertTrue(Prefecture::oita()->region()->equals(Region::kyushu()));

        $this->assertSame('JP-45', Prefecture::miyazaki()->isoCode());
        $this->assertSame('Miyazaki-ken', Prefecture::miyazaki()->suffixedName());
        $this->assertSame('宮崎県', Prefecture::miyazaki()->suffixedKanjiName());
        $this->assertTrue(Prefecture::miyazaki()->region()->equals(Region::kyushu()));

        $this->assertSame('JP-46', Prefecture::kagoshima()->isoCode());
        $this->assertSame('Kagoshima-ken', Prefecture::kagoshima()->suffixedName());
        $this->assertSame('鹿児島県', Prefecture::kagoshima()->suffixedKanjiName());
        $this->assertTrue(Prefecture::kagoshima()->region()->equals(Region::kyushu()));

        $this->assertSame('JP-47', Prefecture::okinawa()->isoCode());
        $this->assertSame('Okinawa-ken', Prefecture::okinawa()->suffixedName());
        $this->assertSame('沖縄県', Prefecture::okinawa()->suffixedKanjiName());
        $this->assertTrue(Prefecture::okinawa()->region()->equals(Region::okinawa()));
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage Cannot call static method: sato
     */
    public function testInvalidFactoryMethod()
    {
        Prefecture::sato();
    }
}
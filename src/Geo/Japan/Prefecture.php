<?php

namespace Tanigami\ValueObjects\Geo\Japan;

use BadMethodCallException;
use InvalidArgumentException;

/**
 * @method static Prefecture hokkaido
 * @method static Prefecture aomori
 * @method static Prefecture iwate
 * @method static Prefecture miyagi
 * @method static Prefecture akita
 * @method static Prefecture yamagata
 * @method static Prefecture fukushima
 * @method static Prefecture ibaraki
 * @method static Prefecture tochigi
 * @method static Prefecture gunma
 * @method static Prefecture saitama
 * @method static Prefecture chiba
 * @method static Prefecture tokyo
 * @method static Prefecture kanagawa
 * @method static Prefecture niigata
 * @method static Prefecture toyama
 * @method static Prefecture ishikawa
 * @method static Prefecture fukui
 * @method static Prefecture yamanashi
 * @method static Prefecture nagano
 * @method static Prefecture gifu
 * @method static Prefecture shizuoka
 * @method static Prefecture aichi
 * @method static Prefecture mie
 * @method static Prefecture shiga
 * @method static Prefecture kyoto
 * @method static Prefecture osaka
 * @method static Prefecture hyogo
 * @method static Prefecture nara
 * @method static Prefecture wakayama
 * @method static Prefecture tottori
 * @method static Prefecture shimane
 * @method static Prefecture okayama
 * @method static Prefecture hiroshima
 * @method static Prefecture yamaguchi
 * @method static Prefecture tokushima
 * @method static Prefecture kagawa
 * @method static Prefecture ehime
 * @method static Prefecture kochi
 * @method static Prefecture fukuoka
 * @method static Prefecture saga
 * @method static Prefecture nagasaki
 * @method static Prefecture kumamoto
 * @method static Prefecture oita
 * @method static Prefecture miyazaki
 * @method static Prefecture kagoshima
 * @method static Prefecture okinawa
 */
class Prefecture
{
    /**
     * @var array
     */
    const DATA = [
        ['isoCode' => 'JP-01', 'name' => 'Hokkaido', 'kanjiName' => '北海道', 'suffix' => 'do', 'region' => 'hokkaido'],
        ['isoCode' => 'JP-02', 'name' => 'Aomori', 'kanjiName' => '青森', 'suffix' => 'ken', 'region' => 'tohoku'],
        ['isoCode' => 'JP-03', 'name' => 'Iwate', 'kanjiName' => '岩手', 'suffix' => 'ken', 'region' => 'tohoku'],
        ['isoCode' => 'JP-04', 'name' => 'Miyagi', 'kanjiName' => '宮城', 'suffix' => 'ken', 'region' => 'tohoku'],
        ['isoCode' => 'JP-05', 'name' => 'Akita', 'kanjiName' => '秋田', 'suffix' => 'ken', 'region' => 'tohoku'],
        ['isoCode' => 'JP-06', 'name' => 'Yamagata', 'kanjiName' => '山形', 'suffix' => 'ken', 'region' => 'tohoku'],
        ['isoCode' => 'JP-07', 'name' => 'Fukushima', 'kanjiName' => '福島', 'suffix' => 'ken', 'region' => 'tohoku'],
        ['isoCode' => 'JP-08', 'name' => 'Ibaraki', 'kanjiName' => '茨城', 'suffix' => 'ken', 'region' => 'kanto'],
        ['isoCode' => 'JP-09', 'name' => 'Tochigi', 'kanjiName' => '栃木', 'suffix' => 'ken', 'region' => 'kanto'],
        ['isoCode' => 'JP-10', 'name' => 'Gunma', 'kanjiName' => '群馬', 'suffix' => 'ken', 'region' => 'kanto'],
        ['isoCode' => 'JP-11', 'name' => 'Saitama', 'kanjiName' => '埼玉', 'suffix' => 'ken', 'region' => 'kanto'],
        ['isoCode' => 'JP-12', 'name' => 'Chiba', 'kanjiName' => '千葉', 'suffix' => 'ken', 'region' => 'kanto'],
        ['isoCode' => 'JP-13', 'name' => 'Tokyo', 'kanjiName' => '東京', 'suffix' => 'to', 'region' => 'kanto'],
        ['isoCode' => 'JP-14', 'name' => 'Kanagawa', 'kanjiName' => '神奈川', 'suffix' => 'ken', 'region' => 'kanto'],
        ['isoCode' => 'JP-15', 'name' => 'Niigata', 'kanjiName' => '新潟', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-16', 'name' => 'Toyama', 'kanjiName' => '富山', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-17', 'name' => 'Ishikawa', 'kanjiName' => '石川', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-18', 'name' => 'Fukui', 'kanjiName' => '福井', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-19', 'name' => 'Yamanashi', 'kanjiName' => '山梨', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-20', 'name' => 'Nagano', 'kanjiName' => '長野', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-21', 'name' => 'Gifu', 'kanjiName' => '岐阜', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-22', 'name' => 'Shizuoka', 'kanjiName' => '静岡', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-23', 'name' => 'Aichi', 'kanjiName' => '愛知', 'suffix' => 'ken', 'region' => 'chubu'],
        ['isoCode' => 'JP-24', 'name' => 'Mie', 'kanjiName' => '三重', 'suffix' => 'ken', 'region' => 'kansai'],
        ['isoCode' => 'JP-25', 'name' => 'Shiga', 'kanjiName' => '滋賀', 'suffix' => 'ken', 'region' => 'kansai'],
        ['isoCode' => 'JP-26', 'name' => 'Kyoto', 'kanjiName' => '京都', 'suffix' => 'fu', 'region' => 'kansai'],
        ['isoCode' => 'JP-27', 'name' => 'Osaka', 'kanjiName' => '大阪', 'suffix' => 'fu', 'region' => 'kansai'],
        ['isoCode' => 'JP-28', 'name' => 'Hyogo', 'kanjiName' => '兵庫', 'suffix' => 'ken', 'region' => 'kansai'],
        ['isoCode' => 'JP-29', 'name' => 'Nara', 'kanjiName' => '奈良', 'suffix' => 'ken', 'region' => 'kansai'],
        ['isoCode' => 'JP-30', 'name' => 'Wakayama', 'kanjiName' => '和歌山', 'suffix' => 'ken', 'region' => 'kansai'],
        ['isoCode' => 'JP-31', 'name' => 'Tottori', 'kanjiName' => '鳥取', 'suffix' => 'ken', 'region' => 'chugoku'],
        ['isoCode' => 'JP-32', 'name' => 'Shimane', 'kanjiName' => '島根', 'suffix' => 'ken', 'region' => 'chugoku'],
        ['isoCode' => 'JP-33', 'name' => 'Okayama', 'kanjiName' => '岡山', 'suffix' => 'ken', 'region' => 'chugoku'],
        ['isoCode' => 'JP-34', 'name' => 'Hiroshima', 'kanjiName' => '広島', 'suffix' => 'ken', 'region' => 'chugoku'],
        ['isoCode' => 'JP-35', 'name' => 'Yamaguchi', 'kanjiName' => '山口', 'suffix' => 'ken', 'region' => 'chugoku'],
        ['isoCode' => 'JP-36', 'name' => 'Tokushima', 'kanjiName' => '徳島', 'suffix' => 'ken', 'region' => 'shikoku'],
        ['isoCode' => 'JP-37', 'name' => 'Kagawa', 'kanjiName' => '香川', 'suffix' => 'ken', 'region' => 'shikoku'],
        ['isoCode' => 'JP-38', 'name' => 'Ehime', 'kanjiName' => '愛媛', 'suffix' => 'ken', 'region' => 'shikoku'],
        ['isoCode' => 'JP-39', 'name' => 'Kochi', 'kanjiName' => '高知', 'suffix' => 'ken', 'region' => 'shikoku'],
        ['isoCode' => 'JP-40', 'name' => 'Fukuoka', 'kanjiName' => '福岡', 'suffix' => 'ken', 'region' => 'kyushu'],
        ['isoCode' => 'JP-41', 'name' => 'Saga', 'kanjiName' => '佐賀', 'suffix' => 'ken', 'region' => 'kyushu'],
        ['isoCode' => 'JP-42', 'name' => 'Nagasaki', 'kanjiName' => '長崎', 'suffix' => 'ken', 'region' => 'kyushu'],
        ['isoCode' => 'JP-43', 'name' => 'Kumamoto', 'kanjiName' => '熊本', 'suffix' => 'ken', 'region' => 'kyushu'],
        ['isoCode' => 'JP-44', 'name' => 'Oita', 'kanjiName' => '大分', 'suffix' => 'ken', 'region' => 'kyushu'],
        ['isoCode' => 'JP-45', 'name' => 'Miyazaki', 'kanjiName' => '宮崎', 'suffix' => 'ken', 'region' => 'kyushu'],
        ['isoCode' => 'JP-46', 'name' => 'Kagoshima', 'kanjiName' => '鹿児島', 'suffix' => 'ken', 'region' => 'kyushu'],
        ['isoCode' => 'JP-47', 'name' => 'Okinawa', 'kanjiName' => '沖縄', 'suffix' => 'ken', 'region' => 'okinawa'],
    ];

    /**
     * @var string
     */
    protected $isoCode;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $kanjiName;

    /**
     * @var PrefectureSuffix
     */
    protected $suffix;

    /**
     * @var Region
     */
    protected $region;

    /**
     * @param string $isoCode
     * @param string $name
     * @param string $kanjiName
     * @param PrefectureSuffix $suffix
     * @param Region $region
     */
    protected function __construct(
        string $isoCode,
        string $name,
        string $kanjiName,
        PrefectureSuffix $suffix,
        Region $region
    ) {
        $this->isoCode = $isoCode;
        $this->name = $name;
        $this->kanjiName = $kanjiName;
        $this->suffix = $suffix;
        $this->region = $region;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return Prefecture
     */
    public static function __callStatic(string $name, array $arguments): self
    {
        $filteredData = array_filter(self::DATA, function (array $prefecture) use ($name) {
            return $name === strtolower($prefecture['name']);
        });
        if ([] === $filteredData) {
            throw new BadMethodCallException(sprintf('Cannot call static method: %s', $name));
        }
        $datum = array_shift($filteredData);
        $suffixFactoryMethod = $datum['suffix'];
        $regionFactoryMethod = $datum['region'];

        return new static(
            $datum['isoCode'],
            $datum['name'],
            $datum['kanjiName'],
            PrefectureSuffix::$suffixFactoryMethod(),
            Region::$regionFactoryMethod()
        );
    }

    /**
     * @param string $kanjiName
     * @return Prefecture
     */
    public static function ofKanjiName(string $kanjiName): self
    {
        $filteredData = array_filter(self::DATA, function (array $prefecture) use ($kanjiName) {
            return $kanjiName === $prefecture['kanjiName'];
        });
        if ([] === $filteredData) {
            throw new InvalidArgumentException(sprintf('There is no prefecture of kanji name: %s', $kanjiName));
        }
        $datum = array_shift($filteredData);
        $suffixFactoryMethod = $datum['suffix'];
        $regionFactoryMethod = $datum['region'];

        return new static(
            $datum['isoCode'],
            $datum['name'],
            $datum['kanjiName'],
            PrefectureSuffix::$suffixFactoryMethod(),
            Region::$regionFactoryMethod()
        );
    }

    /**
     * @param string $suffixedKanjiName
     * @return Prefecture
     */
    public static function ofSuffixedKanjiName(string $suffixedKanjiName): self
    {
        $filteredData = array_filter(self::DATA, function (array $prefecture) use ($suffixedKanjiName) {
            $suffixFactoryMethod = $prefecture['suffix'];
            if ($suffixedKanjiName === '北海道') {
                return $suffixedKanjiName === $prefecture['kanjiName'];
            }

            return $suffixedKanjiName === $prefecture['kanjiName'] . PrefectureSuffix::$suffixFactoryMethod()->kanjiName();
        });
        if ([] === $filteredData) {
            throw new InvalidArgumentException(
                sprintf('There is no prefecture of suffixed kanji name: %s', $suffixedKanjiName)
            );
        }
        $datum = array_shift($filteredData);
        $suffixFactoryMethod = $datum['suffix'];
        $regionFactoryMethod = $datum['region'];

        return new static(
            $datum['isoCode'],
            $datum['name'],
            $datum['kanjiName'],
            PrefectureSuffix::$suffixFactoryMethod(),
            Region::$regionFactoryMethod()
        );
    }

    /**
     * @return string
     */
    public function isoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function kanjiName(): string
    {
        return $this->kanjiName;
    }

    /**
     * @return PrefectureSuffix
     */
    public function suffix(): PrefectureSuffix
    {
        return $this->suffix;
    }

    /**
     * @return Region
     */
    public function region(): Region
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function suffixedName(): string
    {
        if ($this->suffix()->equals(PrefectureSuffix::do())) {
            return $this->name();
        }

        return $this->name().'-'.$this->suffix()->name();
    }

    /**
     * @return string
     */
    public function suffixedKanjiName(): string
    {
        if ($this->suffix()->equals(PrefectureSuffix::do())) {
            return $this->kanjiName();
        }

        return $this->kanjiName().$this->suffix()->kanjiName();
    }
}
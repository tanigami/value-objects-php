<?php

namespace Tanigami\ValueObjects\Geo\Japan;

use BadMethodCallException;
use Exception;
use InvalidArgumentException;

/**
 * @method static Region hokkaido
 * @method static Region tohoku
 * @method static Region kanto
 * @method static Region chubu
 * @method static Region kansai
 * @method static Region chugoku
 * @method static Region shikoku
 * @method static Region kyushu
 * @method static Region okinawa
 */
class Region
{
    /**
     * @var array
     */
    const DATA = [
        ['name' => 'Hokkaido', 'kanjiName' => '北海道'],
        ['name' => 'Tohoku', 'kanjiName' => '東北'],
        ['name' => 'Kanto', 'kanjiName' => '関東'],
        ['name' => 'Chubu', 'kanjiName' => '中部'],
        ['name' => 'Kansai', 'kanjiName' => '関西'],
        ['name' => 'Chugoku', 'kanjiName' => '中国'],
        ['name' => 'Shikoku', 'kanjiName' => '四国'],
        ['name' => 'Kyushu', 'kanjiName' => '九州'],
        ['name' => 'Okinawa', 'kanjiName' => '沖縄'],
    ];

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $kanjiName;

    /**
     * @param array $region
     */
    private function __construct(string $name, string $kanjiName)
    {
        $this->name = $name;
        $this->kanjiName = $kanjiName;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return self
     */
    public static function __callStatic(string $name, array $arguments): self
    {
        $datum = self::filterData(
            'name',
            ucfirst($name),
            new BadMethodCallException(sprintf('Cannot call static method: %s', $name))
        );

        return self::createInstance($datum);
    }

    /**
     * @param string $name
     * @return self
     */
    public static function fromName(string $name): self
    {
        $datum = self::filterData(
            'name',
            ucfirst(strtolower($name)),
            new InvalidArgumentException(sprintf('Invalid region name: %s', $name))
        );

        return new self($datum['name'], $datum['kanjiName']);
    }

    /**
     * @param string $kanjiName
     * @return self
     */
    public static function fromKanjiName(string $kanjiName): self
    {
        $datum = self::filterData(
            'kanjiName',
            $kanjiName,
            new InvalidArgumentException(sprintf('Invalid region name in kanji: %s', $kanjiName))
        );

        return new self($datum['name'], $datum['kanjiName']);
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
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->name === $other->name;
    }

    /**
     * @param string $key
     * @param string $value
     * @param Exception $e
     * @return array
     * @throws Exception
     */
    private static function filterData(string $key, string $value, Exception $e): array
    {
        $filteredData = array_filter(self::DATA, function (array $datum) use ($key, $value) {
            return $value === $datum[$key];
        });
        if ([] === $filteredData) {
            throw $e;
        }

        return array_shift($filteredData);
    }

    /**
     * @param array $datum
     * @return self
     */
    private static function createInstance(array $datum): self
    {
        return new self($datum['name'], $datum['kanjiName']);
    }
}

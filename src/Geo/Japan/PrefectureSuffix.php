<?php

namespace Tanigami\ValueObjects\Geo\Japan;

use BadMethodCallException;

/**
 * @method static PrefectureSuffix to
 * @method static PrefectureSuffix do
 * @method static PrefectureSuffix fu
 * @method static PrefectureSuffix ken
 */
class PrefectureSuffix
{
    /**
     * @var array
     */
    const DATA = [
        ['name' => 'to', 'kanjiName' => '都'],
        ['name' => 'do', 'kanjiName' => '道'],
        ['name' => 'fu', 'kanjiName' => '府'],
        ['name' => 'ken', 'kanjiName' => '県'],
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
     * @param string $name
     * @param string $kanjiName
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
        $filteredData = array_filter(self::DATA, function (array $suffix) use ($name) {
            return $name === $suffix['name'];
        });
        if ([] === $filteredData) {
            throw new BadMethodCallException(sprintf('Cannot call static method: %s', $name));
        }
        $datum = array_shift($filteredData);

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
}

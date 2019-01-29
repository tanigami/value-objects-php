<?php

namespace Tanigami\ValueObjects\Geo;

use InvalidArgumentException;

class Latitude
{
    /**
     * @var float
     */
    protected $latitude;

    /**
     * @param float $latitude
     */
    public function __construct(float $latitude)
    {
        if (!(-90 <= $latitude && $latitude <= 90)) {
            throw new InvalidArgumentException(sprintf('Latitude must be between -90 and 90: %s', $latitude));
        }

        $this->latitude = $latitude;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->latitude === $other->latitude;
    }

    /**
     * @return float
     */
    public function latitude(): float
    {
        return $this->latitude;
    }
}

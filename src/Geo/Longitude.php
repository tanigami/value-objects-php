<?php

namespace Tanigami\ValueObjects\Geo;

use InvalidArgumentException;

class Longitude
{
    /**
     * @var float
     */
    protected $longitude;

    /**
     * @param float $longitude
     */
    public function __construct(float $longitude)
    {
        if (!(-180 <= $longitude && $longitude <= 180)) {
            throw new InvalidArgumentException(sprintf('Longitude must be between -180 and 180: %s', $longitude));
        }

        $this->longitude = $longitude;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return
            $this->longitude === $other->longitude ||
            abs($this->longitude) === 180.0 && $this->longitude === -$other->longitude;
    }

    /**
     * @return float
     */
    public function longitude(): float
    {
        return $this->longitude;
    }
}

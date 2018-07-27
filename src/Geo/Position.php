<?php

namespace Tanigami\ValueObjects\Geo;

class Position
{
    /**
     * @var Latitude
     */
    private $latitude;

    /**
     * @var Longitude
     */
    private $longitude;

    /**
     * @param Latitude $latitude
     * @param Longitude $longitude
     */
    public function __construct(Latitude $latitude, Longitude $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return Latitude
     */
    public function latitude(): Latitude
    {
        return $this->latitude;
    }

    /**
     * @return Longitude
     */
    public function longitude(): Longitude
    {
        return $this->longitude;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->latitude->equals($other->latitude) && $this->longitude->equals($other->longitude);
    }
}

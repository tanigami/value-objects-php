<?php

namespace Tanigami\ValueObjects\Time;

use InvalidArgumentException;

class TimeLength
{
    /**
     * @var int
     */
    private $lengthInSeconds;

    /**
     * @param int $lengthInSeconds
     */
    private function __construct(int $lengthInSeconds)
    {
        if (!($lengthInSeconds >= 0)) {
            throw new InvalidArgumentException(sprintf('Length cannot be negative in seconds: %s', $lengthInSeconds));
        }

        $this->lengthInSeconds = $lengthInSeconds;
    }

    /**
     * @param int $seconds
     * @return self
     */
    public static function ofSeconds(int $seconds): self
    {
        return new self($seconds);
    }

    /**
     * @param int $minutes
     * @return self
     */
    public static function ofMinutes(int $minutes): self
    {
        return new self($minutes * 60);
    }

    /**
     * @param int $hours
     * @return self
     */
    public static function ofHours(int $hours): self
    {
        return new self($hours * 3600);
    }

    /**
     * @param int $days
     * @return self
     */
    public static function ofDays(int $days): self
    {
        return new self($days * 86400);
    }

    /**
     * @param self $other
     */
    public function equals(self $other): bool
    {
        return $this->lengthInSeconds === $other->lengthInSeconds;
    }

    /**
     * @return int
     */
    public function hasSeconds(): int
    {
        return $this->lengthInSeconds;
    }

    /**
     * @return int
     */
    public function hasMinutes(): int
    {
        return intval(floor($this->lengthInSeconds / 60));
    }

    /**
     * @return int
     */
    public function hasHours(): int
    {
        return intval(floor($this->lengthInSeconds / 3600));
    }

    /**
     * @return int
     */
    public function hasDays(): int
    {
        return intval(floor($this->lengthInSeconds / 86400));
    }
}

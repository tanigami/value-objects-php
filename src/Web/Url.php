<?php

namespace Tanigami\ValueObjects\Web;

use InvalidArgumentException;

class Url
{
    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        if (false === filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(sprintf('Invalid URL: %s', $url));
        }
        $this->url = $url;
    }

    /**
     * @param Url $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->url === $other->url;
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->url;
    }
}

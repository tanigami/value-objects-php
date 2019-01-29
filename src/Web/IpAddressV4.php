<?php

namespace Tanigami\ValueObjects\Web;

use InvalidArgumentException;

class IpAddressV4
{
    /**
     * @var string
     */
    protected $ipAddressV4;

    /**
     * @param string $ipAddressV4
     */
    public function __construct(string $ipAddressV4)
    {
        if (false === filter_var($ipAddressV4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidArgumentException(sprintf('Invalid IP address v4: %s', $ipAddressV4));
        }
        $this->ipAddressV4 = $ipAddressV4;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->ipAddressV4 === $other->ipAddressV4;
    }

    /**
     * @return string
     */
    public function ipAddressV4(): string
    {
        return $this->ipAddressV4;
    }
}

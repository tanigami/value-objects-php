<?php

namespace Tanigami\ValueObjects\Web;

use InvalidArgumentException;

class IpAddressV6
{
    /**
     * @var string
     */
    protected $ipAddressV6;

    /**
     * @param string $ipAddressV6
     */
    public function __construct(string $ipAddressV6)
    {
        if (false === filter_var($ipAddressV6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            throw new InvalidArgumentException(sprintf('Invalid IP address v6: %s', $ipAddressV6));
        }
        $this->ipAddressV6 = $ipAddressV6;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->ipAddressV6 === $other->ipAddressV6;
    }

    /**
     * @return string
     */
    public function ipAddressV6(): string
    {
        return $this->ipAddressV6;
    }
}

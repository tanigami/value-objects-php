<?php

namespace Tanigami\ValueObjects\Web;

use InvalidArgumentException;

class EmailAddress
{
    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @param string $emailAddress
     */
    public function __construct(string $emailAddress)
    {
        if (false === filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('Invalid email address: %s', $emailAddress));
        }

        $this->emailAddress = $emailAddress;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->emailAddress === $other->emailAddress;
    }

    /**
     * @return string
     */
    public function emailAddress(): string
    {
        return $this->emailAddress;
    }
}

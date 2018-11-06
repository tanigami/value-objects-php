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
     * @param bool $validateSoft
     */
    public function __construct(string $emailAddress, bool $validateSoft = false)
    {
        if ($validateSoft && !$this->validateSoft($emailAddress) ||
            !$validateSoft && !$this->validateStrict($emailAddress)
        ) {
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

    /**
     * @param string $emailAddress
     * @return bool
     */
    private function validateSoft(string $emailAddress): bool
    {
        return preg_match('/^.+\@\S+\.\S+$/', $emailAddress);
    }

    /**
     * @param string $emailAddress
     * @return bool
     */
    private function validateStrict(string $emailAddress): bool
    {
        return filter_var($emailAddress, FILTER_VALIDATE_EMAIL);
    }
}

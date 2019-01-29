<?php

namespace Tanigami\ValueObjects\Money;

use InvalidArgumentException;

class Money
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @param int $amount
     * @param Currency $currency
     */
    public function __construct(int $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function currency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->amount === $other->amount() && $this->currency()->equals($other->currency());
    }

    /**
     * @return Money
     */
    public function duplicate()
    {
        return new static($this->amount(), $this->currency());
    }

    /**
     * @param self $other
     * @return Money
     */
    public function add(self $other): Money
    {
        if (!$this->currency()->equals($other->currency())) {
            throw new InvalidArgumentException(
                sprintf(
                    'Moneys with different currencies cannot be added: %s, %s',
                    $this->currency()->isoCode(),
                    $other->currency()->isoCode()
                )
            );
        }

        return new static($this->amount() + $other->amount(), $this->currency());
    }

    /**
     * @param self $other
     * @return self
     */
    public function sub(self $other): self
    {
        if (!$this->currency()->equals($other->currency())) {
            throw new InvalidArgumentException(
                sprintf(
                    'Money with different currency cannot be subtracted: %s, %s',
                    $this->currency()->isoCode(),
                    $other->currency()->isoCode()
                )
            );
        }

        return new static($this->amount() - $other->amount(), $this->currency());
    }

    /**
     * @param self $multiplier
     * @return self
     */
    public function multiply(float $multiplier): self
    {
        return new static(intval(floor($this->amount() * $multiplier)), $this->currency());
    }

    /**
     * @param int $amount
     * @return Money
     */
    public function increaseAmountBy(int $amount): self
    {
        if ($amount < 0) {
            throw new InvalidArgumentException(
                sprintf(
                    'Cannot increase by negative amount: %s',
                    $amount
                )
            );
        }

        return new static($this->amount() + $amount, $this->currency());
    }

    /**
     * @param int $amount
     * @return Money
     */
    public function decreaseAmountBy(int $amount): self
    {
        if ($amount < 0) {
            throw new InvalidArgumentException(
                sprintf(
                    'Cannot decrease by negative amount: %s',
                    $amount
                )
            );
        }

        return new static($this->amount() - $amount, $this->currency());
    }
}

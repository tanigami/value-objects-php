<?php

namespace Tanigami\ValueObjects\Money;

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testEqualsReturnsTrueIfAmountAndCurrencyAreEqual()
    {
        $this->assertTrue((new Money(12345, Currency::usd()))->equals(new Money(12345, Currency::usd())));
        $this->assertFalse((new Money(12345, Currency::usd()))->equals(new Money(54321, Currency::usd())));
        $this->assertFalse((new Money(12345, Currency::usd()))->equals(new Money(12345, Currency::jpy())));
    }

    public function testDuplicatedMoneyEqualsToButIsNotIdenticalToOriginalMoney()
    {
        $originalMoney = new Money(12345, Currency::usd());
        $duplicatedMoney = $originalMoney->duplicate();
        $this->assertTrue($originalMoney->equals($duplicatedMoney));
        $this->assertFalse($originalMoney === $duplicatedMoney);
    }

    public function testMoneysAreAddedWithoutSideEffect()
    {
        $money = new Money(12345, Currency::usd());
        $anotherMoney = new Money(54321, Currency::usd());
        $this->assertTrue($money->add($anotherMoney)->equals(new Money(66666, Currency::usd())));
        $this->assertTrue($money->equals(new Money(12345, Currency::usd())));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Moneys with different currencies cannot be added: USD, JPY
     */
    public function testMoneysWithDifferentCurrenciesCannotBeAdded()
    {
        (new Money(12345, Currency::usd()))->add(new Money(12345, Currency::jpy()));
    }

    public function testMoneyIsSubtractedWithoutSideEffect()
    {
        $money = new Money(54321, Currency::usd());
        $anotherMoney = new Money(12345, Currency::usd());
        $this->assertTrue($money->sub($anotherMoney)->equals(new Money(41976, Currency::usd())));
        $this->assertTrue($money->equals(new Money(54321, Currency::usd())));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Money with different currency cannot be subtracted: USD, JPY
     */
    public function testMoneyWithDifferentCurrencyCannotBeSubtracted()
    {
        (new Money(12345, Currency::usd()))->sub(new Money(12345, Currency::jpy()));
    }

    public function testMoneyIsMultipliedWithoutSideEffect()
    {
        $money = new Money(54321, Currency::usd());
        $this->assertTrue($money->multiply(1.5)->equals(new Money(81481, Currency::usd())));
        $this->assertTrue($money->equals(new Money(54321, Currency::usd())));
    }

    public function testIncreaseByAmountIncreasesAmountWithourSideEffect()
    {
        $money = new Money(12345, Currency::usd());
        $increasedMoney = $money->increaseAmountBy(54321);
        $this->assertTrue($increasedMoney->equals(new Money(66666, Currency::usd())));
        $this->assertTrue($money->equals(new Money(12345, Currency::usd())));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Cannot increase by negative amount: -1
     */
    public function testIncreaseByNegativeAmountThrowsException()
    {
        (new Money(12345, Currency::usd()))->increaseAmountBy(-1);
    }

    public function testDecreaseByAmountIncreasesAmountWithourSideEffect()
    {
        $money = new Money(54321, Currency::usd());
        $decreasedMoney = $money->decreaseAmountBy(12345);
        $this->assertTrue($decreasedMoney->equals(new Money(41976, Currency::usd())));
        $this->assertTrue($money->equals(new Money(54321, Currency::usd())));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Cannot decrease by negative amount: -1
     */
    public function testDecreaseByNegativeAmountThrowsException()
    {
        (new Money(12345, Currency::usd()))->decreaseAmountBy(-1);
    }
}

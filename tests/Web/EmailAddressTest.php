<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage Invalid email address: this_is_not_email_address
     */
    public function testConstructorThrowsExceptionIfUrlIsInvalid()
    {
        new EmailAddress('this_is_not_email_address');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage Invalid email address: email..@example.com'
     */
    public function testConstructorValidatesStrict()
    {
        new EmailAddress('email..@example.com');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage Invalid email address: this_is_not_email_address
     */
    public function testConstructorValidatesSoft()
    {
        new EmailAddress('email..@example.com', true);
        new EmailAddress('this_is_not_email_address', true);
    }

    public function testGetterReturnsValueString()
    {
        $this->assertSame('tanigami@gmail.com', (new EmailAddress('tanigami@gmail.com'))->emailAddress());
    }

    public function testEquelsReturnsTrueIfUrlsAreSame()
    {
        $this->assertTrue((new EmailAddress('tanigami@gmail.com'))->equals(new EmailAddress('tanigami@gmail.com')));
        $this->assertFalse((new EmailAddress('tanigami@gmail.com'))->equals(new EmailAddress('email@example.com')));
    }
}

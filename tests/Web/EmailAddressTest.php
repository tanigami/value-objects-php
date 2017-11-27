<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage nvalid email address: this_is_not_email_address
     */
    public function testConstructorReturnsExceptionIfUrlIsInvalid()
    {
        new EmailAddress('this_is_not_email_address');
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

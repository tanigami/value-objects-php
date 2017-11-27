<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailWithMandatoryArguments()
    {
        $email = new Email(
            'SUBJECT',
            'BODY',
            new EmailAddress('tanigami+from@gmail.com'),
            [new EmailAddress('tanigami+to@gmail.com')]
        );
        $this->assertSame('SUBJECT', $email->subject());
        $this->assertSame('BODY', $email->body());
        $this->assertTrue($email->from()->equals(new EmailAddress('tanigami+from@gmail.com')));
        $this->assertCount(1, $email->tos());
        $this->assertTrue($email->tos()[0]->equals(new EmailAddress('tanigami+to@gmail.com')));
        $this->assertSame([], $email->ccs());
        $this->assertSame([], $email->bccs());
        $this->assertSame([], $email->attachments());
    }

    public function testEmailWithFullArguments()
    {
        $email = new Email(
            'SUBJECT',
            'BODY',
            new EmailAddress('tanigami+from@gmail.com'),
            [new EmailAddress('tanigami+to1@gmail.com'), new EmailAddress('tanigami+to2@gmail.com')],
            [new EmailAddress('tanigami+cc1@gmail.com'), new EmailAddress('tanigami+cc2@gmail.com')],
            [new EmailAddress('tanigami+bcc1@gmail.com'), new EmailAddress('tanigami+bcc2@gmail.com')],
            [
                new EmailAttachment('{"DUMMY":"JSON"}', 'dummy.json'),
                new EmailAttachment('<html>DUMMY HTML</html>', 'dummy.html'),
            ]
        );
        $this->assertSame('SUBJECT', $email->subject());
        $this->assertSame('BODY', $email->body());
        $this->assertTrue($email->from()->equals(new EmailAddress('tanigami+from@gmail.com')));
        $this->assertCount(2, $email->tos());
        $this->assertTrue($email->tos()[0]->equals(new EmailAddress('tanigami+to1@gmail.com')));
        $this->assertTrue($email->tos()[1]->equals(new EmailAddress('tanigami+to2@gmail.com')));
        $this->assertCount(2, $email->ccs());
        $this->assertTrue($email->ccs()[0]->equals(new EmailAddress('tanigami+cc1@gmail.com')));
        $this->assertTrue($email->ccs()[1]->equals(new EmailAddress('tanigami+cc2@gmail.com')));
        $this->assertCount(2, $email->bccs());
        $this->assertTrue($email->bccs()[0]->equals(new EmailAddress('tanigami+bcc1@gmail.com')));
        $this->assertTrue($email->bccs()[1]->equals(new EmailAddress('tanigami+bcc2@gmail.com')));
        $this->assertCount(2, $email->attachments());
        $this->assertSame('{"DUMMY":"JSON"}', $email->attachments()[0]->content());
        $this->assertSame('dummy.json', $email->attachments()[0]->fileName());
        $this->assertSame('application/json', $email->attachments()[0]->mimeType());
        $this->assertSame('<html>DUMMY HTML</html>', $email->attachments()[1]->content());
        $this->assertSame('dummy.html', $email->attachments()[1]->fileName());
        $this->assertSame('text/html', $email->attachments()[1]->mimeType());
    }
}

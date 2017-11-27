<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class EmailAttachmentTest extends TestCase
{
    public function testCreateJsonEmailAttachment()
    {
        $emailAttachment = new EmailAttachment('{"DUMMY":"JSON"}', 'dummy.json');
        $this->assertSame('{"DUMMY":"JSON"}', $emailAttachment->content());
        $this->assertSame('dummy.json', $emailAttachment->fileName());
        $this->assertSame('application/json', $emailAttachment->mimeType());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage File name does not have extension: filename
     */
    public function testFileNameHasToHaveExtension()
    {
        new EmailAttachment('file_content', 'filename');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Mime type cannot be detected by extension: lol
     */
    public function testFileNameCannotBeWithUnknownExtension()
    {
        new EmailAttachment('file_content', 'filename.lol');
    }
}

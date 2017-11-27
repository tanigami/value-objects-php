<?php

namespace Tanigami\ValueObjects\Web;

class Email
{
    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var EmailAddress
     */
    protected $from;

    /**
     * @var EmailAddress[]
     */
    protected $tos;

    /**
     * @var EmailAddress[]
     */
    protected $ccs;

    /**
     * @var EmailAddress[]
     */
    protected $bccs;

    /**
     * @var EmailAttachment[]
     */
    protected $attachments;

    /**
     * @param string $subject
     * @param string $body
     * @param EmailAddress $from
     * @param EmailAddress[] $tos
     * @param EmailAddress[] $ccs
     * @param EmailAddress[] $bccs
     * @param EmailAttachment $attachments
     */
    public function __construct(
        string $subject,
        string $body,
        EmailAddress $from,
        array $tos,
        array $ccs = [],
        array $bccs = [],
        array $attachments = []
    ) {

        $this->subject = $subject;
        $this->body = $body;
        $this->from = $from;
        $this->tos = $tos;
        $this->ccs = $ccs;
        $this->bccs = $bccs;
        $this->attachments = $attachments;
    }

    /**
     * @return string
     */
    public function subject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function body(): string
    {
        return $this->body;
    }

    /**
     * @return EmailAddress
     */
    public function from(): EmailAddress
    {
        return $this->from;
    }

    /**
     * @return EmailAddress[]
     */
    public function tos(): array
    {
        return $this->tos;
    }

    /**
     * @return EmailAddress[]
     */
    public function ccs(): array
    {
        return $this->ccs;
    }

    /**
     * @return EmailAddress[]
     */
    public function bccs(): array
    {
        return $this->bccs;
    }

    /**
     * @return EmailAttachment[]
     */
    public function attachments(): array
    {
        return $this->attachments;
    }
}

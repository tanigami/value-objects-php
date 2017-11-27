<?php

namespace Tanigami\ValueObjects\Web;

class HttpMethod
{
    /**
     * @var string
     */
    const GET = 'GET';

    /**
     * @var string
     */
    const HEAD = 'HEAD';

    /**
     * @var string
     */
    const POST = 'POST';

    /**
     * @var string
     */
    const PUT = 'PUT';

    /**
     * @var string
     */
    const DELETE = 'DELETE';

    /**
     * @var string
     */
    const CONNECT = 'CONNECT';

    /**
     * @var string
     */
    const OPTIONS = 'OPTIONS';

    /**
     * @var string
     */
    const TRACE = 'TRACE';

    /**
     * @var string
     */
    const PATCH = 'PATCH';

    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @param string $httpMethod
     */
    private function __construct(string $httpMethod)
    {
        $this->httpMethod = $httpMethod;
    }

    /**
     * @return self
     */
    public static function get(): self
    {
        return new self(self::GET);
    }

    /**
     * @return self
     */
    public static function head(): self
    {
        return new self(self::HEAD);
    }

    /**
     * @return self
     */
    public static function post(): self
    {
        return new self(self::POST);
    }

    /**
     * @return self
     */
    public static function put(): self
    {
        return new self(self::PUT);
    }

    /**
     * @return self
     */
    public static function delete(): self
    {
        return new self(self::DELETE);
    }

    /**
     * @return self
     */
    public static function connect(): self
    {
        return new self(self::CONNECT);
    }

    /**
     * @return self
     */
    public static function options(): self
    {
        return new self(self::OPTIONS);
    }

    /**
     * @return self
     */
    public static function trace(): self
    {
        return new self(self::TRACE);
    }

    /**
     * @return self
     */
    public static function patch(): self
    {
        return new self(self::PATCH);
    }

    /**
     * @param HttpMethod $other
     */
    public function equals(self $other): bool
    {
        return $this->httpMethod === $other->httpMethod;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->httpMethod;
    }
}

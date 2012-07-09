<?php

namespace OpenDDR\Model;

use W3C\DDR\Simple\EvidenceInterface;

class HTTPEvidence implements EvidenceInterface
{
    /**
     * @var array
     */
    private $headers;

    /**
     * @param array $headers
     */
    public function __construct(array $headers = array())
    {
        $this->headers = $headers;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function exists($key)
    {
        return isset($this->headers[strtolower($key)]);
    }

    /**
     * @param string $key
     * @return string
     */
    public function get($key)
    {
        return $this->headers[strtolower($key)];
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function put($key, $value)
    {
        $this->headers[strtolower($key)] = $value;
    }
}
<?php

namespace OpenDDR\Exception;

class ParseResolverException extends \Exception
{
    public function __construct($file)
    {
        $message = sprintf('Cannot parse file "%s"', $file);
        parent::__construct($message);
    }
}
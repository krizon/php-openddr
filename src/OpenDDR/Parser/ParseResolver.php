<?php

namespace OpenDDR\Parser;

use Symfony\Component\Finder\SplFileInfo;

class ParseResolver
{
    /**
     * @var ParserInterface[]
     */
    private $parsers;

    /**
     * @param array ParserInterface[]
     */
    public function __construct(array $parsers = array())
    {
        $this->parsers = $parsers;
    }

    /**
     * @param $file
     * @return mixed|ParserInterface
     */
    public function resolve(SplFileInfo $file)
    {
        foreach ($this->parsers as $parser) {
            if ($parser->supports($file)) {
                return $parser;
            }
        }

        return false;
    }

    /**
     * @param ParserInterface $parser
     */
    public function addParser(ParserInterface $parser)
    {
        $this->parsers[] = $parser;
    }

    /**
     * @return array|ParserInterface[]
     */
    public function getParsers()
    {
        return $this->parsers;
    }
}
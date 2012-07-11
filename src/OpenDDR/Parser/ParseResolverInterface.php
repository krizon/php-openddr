<?php

namespace OpenDDR\Parser;

use Symfony\Component\Finder\SplFileInfo;

interface ParseResolverInterface
{
    /**
     * Returns a parser able to parse the file
     *
     * @abstract
     * @param $file
     * @return mixed
     */
    public function resolve(SplFileInfo $file);
}
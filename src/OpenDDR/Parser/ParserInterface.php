<?php

namespace OpenDDR\Parser;

use Symfony\Component\Finder\SplFileInfo;
use OpenDDR\Storage\StorageInterface;

interface ParserInterface
{
    /**
     * Parse and save the file
     *
     * @abstract
     * @param \Symfony\Component\Finder\SplFileInfo $file
     * @return bool
     */
    public function parse(SplFileInfo $file, StorageInterface $storage);

    /**
     * Does this parser supports the given file?
     *
     * @abstract
     * @param \Symfony\Component\Finder\SplFileInfo $file
     * @return bool
     */
    public function supports(SplFileInfo $file);

    /**
     * Returns the unique subject name for this parser
     *
     * @abstract
     * @return mixed
     */
    public function getSubject();

    /**
     * Does the source this parses handles needs a rebuild?
     *
     * @abstract
     * @param \Symfony\Component\Finder\SplFileInfo $file
     * @return mixed
     */
    public function needsRebuild(SplFileInfo $file);
}
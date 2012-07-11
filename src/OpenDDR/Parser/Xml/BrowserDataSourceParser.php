<?php

namespace OpenDDR\Parser\Xml;

use Symfony\Component\Finder\SplFileInfo;
use OpenDDR\Parser\XmlParser;
use OpenDDR\Model\Browser;
use OpenDDR\Storage\StorageInterface;

class BrowserDataSourceParser extends XmlParser
{
    public function __construct(StorageInterface $storage)
    {
        parent::__construct($storage, 'BrowserDataSource.xml', 'browser', 'OpenDDR\Model\Browser');
    }
}
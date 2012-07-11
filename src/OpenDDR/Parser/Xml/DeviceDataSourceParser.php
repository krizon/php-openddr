<?php

namespace OpenDDR\Parser\Xml;

use Symfony\Component\Finder\SplFileInfo;
use OpenDDR\Parser\XmlParser;
use OpenDDR\Model\Device;
use OpenDDR\Storage\StorageInterface;

class DeviceDataSourceParser extends XmlParser
{
    public function __construct(StorageInterface $storage)
    {
        parent::__construct($storage, 'DeviceDataSource.xml', 'device', 'OpenDDR\Model\Device');
    }
}
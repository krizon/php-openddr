<?php

namespace OpenDDR\Console\Helper;

use Symfony\Component\Console\Helper\Helper;
use OpenDDR\Storage\StorageManager;

class StorageManagerHelper extends Helper
{
    private $manager;

    public function __construct(StorageManager $manager)
    {
        $this->manager = $manager;
    }

    public function getStorageManager()
    {
        return $this->manager;
    }

    public function getName()
    {
        return 'storageManager';
    }
}


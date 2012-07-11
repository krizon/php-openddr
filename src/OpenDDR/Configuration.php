<?php

namespace OpenDDR;

use OpenDDR\Storage\StorageInterface;

class Configuration
{
    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * @param Storage\StorageInterface $storage
     */
    public function setStorage(StorageInterface $storage)
    {
        $this->attributes['storage'] = $storage;
    }

    /**
     * @return null
     */
    public function getStorage()
    {
        return isset($this->attributes['storage']) ? $this->attributes['storage'] : null;
    }
}
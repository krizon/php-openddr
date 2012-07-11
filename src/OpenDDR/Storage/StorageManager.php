<?php

namespace OpenDDR\Storage;

use Symfony\Component\Finder\Finder;
use OpenDDR\Parser\Xml\BrowserDataSourceParser;
use OpenDDR\Parser\ParseResolver;
use OpenDDR\Parser\Xml\DeviceDataSourceParser;
use OpenDDR\Parser\DelegatingParser;
use OpenDDR\Exception\StorageException;
use SplFileInfo;

class StorageManager
{
    protected $storage;
    protected $resourcePath;
    protected $parser;

    /**
     * @param StorageInterface $storage
     * @param $resourcePath
     */
    public function __construct(StorageInterface $storage, $resourcePath)
    {
        $this->storage      = $storage;
        $this->resourcePath = $resourcePath;
        $this->parser       = $this->createParser();
    }

    public function needsRebuild()
    {
        foreach ($this->findResources() as $file) {
            if ($parser = $this->parser->resolve($file)) {
                if ($parser->needsRebuild($file)) {
                    return true;
                }
            }
        }

        return false;
    }

    public function rebuild()
    {
        foreach ($this->findResources() as $file) {
            if ($parser = $this->parser->resolve($file)) {
                $parser->parse($file, $this->storage);
            }
        }
    }

    /**
     * @static
     * @param array $config
     * @return StorageManager
     * @throws \OpenDDR\Exception\StorageException
     */
    public static function create(array $config)
    {
        if (! isset($config['storage'])) {
            throw new StorageException('No storage engine provided');
        }
        if (! isset($config['resource_path'])) {
            throw new StorageException('No resource_path defined');
        }
        switch ($config['storage']) {
            case 'file':
                if (! isset($config['target_path'])) {
                    throw new StorageException('No target_path provided');
                }
                return new self(new \OpenDDR\Storage\FileStorage($config['target_path']), $config['resource_path']);
        }
    }

    protected function findResources()
    {
        $finder = new Finder();
        $finder->files()->in($this->resourcePath)->name('*.xml');
        return $finder;
    }

    /**
     * @return ParseResolver
     */
    protected function createParser()
    {
        $parseResolver = new ParseResolver(array(
            new BrowserDataSourceParser($this->storage),
            new DeviceDataSourceParser($this->storage)
        ));
        return $parseResolver;
    }
}
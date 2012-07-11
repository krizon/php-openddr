<?php

namespace OpenDDR\Storage;

use OpenDDR\Exception\StorageException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author  Richard van den Brand   <richard@vandenbrand.org>
 */
class FileStorage implements StorageInterface
{
    private $path;
    private $filesystem;

    public function __construct($path)
    {
        $this->filesystem = new Filesystem();
        $this->path = $path;
    }

    public function save($subject, $id, $object)
    {
        file_put_contents($this->getPath($subject).'_building/'.$this->getFilename($id), serialize($object));
    }

    public function preSave($subject, $md5)
    {
        $path = $this->getPath($subject).'_building';
        // Create a new directory for saving
        if (is_dir($path)) {
            $this->filesystem->remove($path);
        }
        $this->filesystem->mkdir($path);
        // Save metadata
        file_put_contents(sprintf('%s/_meta', $path), $md5);
    }

    public function postSave($subject)
    {
        $new = $this->getPath($subject).'_building';
        $old = $this->getPath($subject);
        $this->filesystem->remove($old);
        $this->filesystem->rename($new, $old);
    }

    public function needsRebuild($subject, $md5)
    {
        $file = $this->getPath($subject).'/_meta';
        if (! $this->filesystem->exists($file)) {
            return true;
        }

        $md5file = file_get_contents($file);
        return $md5 !== $md5file;
    }

    private function getPath($subject)
    {
        return sprintf('%s/%s', $this->path, $subject);
    }

    private function getFilename($id)
    {
        return str_replace('/', '', $id);
    }
}
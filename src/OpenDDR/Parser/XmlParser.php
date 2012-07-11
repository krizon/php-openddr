<?php

namespace OpenDDR\Parser;

use Symfony\Component\Finder\SplFileInfo;
use OpenDDR\Storage\StorageInterface;
use RuntimeException;

abstract class XmlParser implements XmlParserInterface
{
    protected $storage;
    protected $filename;
    protected $tag;
    protected $class;

    public function __construct(StorageInterface $storage, $filename, $tag, $class)
    {
        $this->storage  = $storage;
        $this->filename = $filename;
        $this->tag      = $tag;
        $this->class    = $class;
    }

    public function supports(SplFileInfo $file)
    {
        return $file->getFilename() === $this->filename;
    }

    public function parse(SplFileInfo $file, StorageInterface $storage)
    {
        $this->storage = $storage;
        $this->storage->preSave($this->filename, md5_file($file->getPathname()));
        $file   = $file->openFile();
        $parser = xml_parser_create('UTF-8');
        xml_set_object($parser, $this);
        xml_set_element_handler($parser, 'startTag', 'endTag');
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);
        try {
            while($line = $file->fgets()) {
                xml_parse($parser, $line, $file->eof());
            }
        } catch (RuntimeException $e) {
            // When handling large XML files, sometimes a RuntimeException is being thrown. @todo: investigate
        }

        $this->storage->postSave($this->filename);
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function getSubject()
    {
        return $this->getFilename();
    }

    public function needsRebuild(SplFileInfo $file)
    {
        return $this->storage->needsRebuild($this->filename, md5_file($file->getPathname()));
    }

    public function startTag($parser, $name, array $attribs)
    {
        switch ($name) {
            case $this->tag:
                $this->data = new $this->class();
                $this->id   = $attribs['id'];

                break;

            case 'property':
                $this->data->putProperty($attribs['name'], $attribs['value']);
                break;
        }
    }

    public function endTag($parser, $name)
    {
        if ($name === $this->tag) {
            $this->storage->save($this->getFilename(), $this->id, $this->data);
            $this->data = $this->id = null;
        }
    }
}
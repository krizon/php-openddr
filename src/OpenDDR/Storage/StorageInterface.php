<?php

namespace OpenDDR\Storage;

interface StorageInterface
{
    public function save($subject, $id, $object);

    public function preSave($subject, $md5);

    public function postSave($subject);

    public function needsRebuild($subject, $md5);
}
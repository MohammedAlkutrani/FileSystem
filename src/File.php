<?php

namespace FileSystem;

class File
{
    protected $fileSystem;

    public function __construct(FileInterface $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    /**
     * Write in file even if not exists.
     * 
     * @param $file
     * @param $content 
     * 
     * @return bool
     */
    public function writeOrCreate($file, $content) : bool
    {
        return $this->fileSystem->writeOrCreate($file, $content);
    }
}
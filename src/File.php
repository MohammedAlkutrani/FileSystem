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

    /**
     * Determine if file is writable.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function isWritable($file) : bool
    {
        return $this->fileSystem->isWritable($file);
    }

    /**
     * Determine if file is exists.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function exists($file) : bool
    {
        return $this->fileSystem->exists($file);
    }

    /**
     * Write in file.
     * 
     * @param $file
     * @param $content
     * 
     * @return bool
     */
    public function write($file, $content) : bool
    {
        return $this->fileSystem->write($file, $content);
    }
}
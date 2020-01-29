<?php

namespace FileSystem;

class File
{
    protected $fileSystem;

    public function __construct(StroageInterface $fileSystem)
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

    /**
     * Determine if it's a file.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function isFile($file) : bool
    {
        return $this->fileSystem->isFile($file);
    }

    /**
     * Getting file size.
     * 
     * @param $file
     * 
     * @return int
     */
    public function size($file) : int
    {
        return $this->fileSystem->size($file);
    }

    /**
     * Getting the last access time.
     * 
     * @param $file
     * 
     * @return int
     */
    public function lastModified($file) : int
    {
        return $this->fileSystem->lastModified($file);
    }

    /**
     * Returns the type of the given file.
     * 
     * @param $file
     * 
     * @return string
     */
    public function getExtension($file) : string
    {
        return $this->fileSystem->getExtension($file);
    }

    /**
     * Check for the given extension.
     * 
     * @param $file
     * @param $extension
     * 
     * @return bool
     */
    public function isExtension($file, $extension) : bool
    {
        return $this->fileSystem->isExtension($file, $extension);
    }

    /**
     * Delete the given file.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function delete($file) : bool
    {
        return $this->fileSystem->delete($file);
    }

    /**
     * Copy the file to given directory.
     * 
     * @param $file
     * @param $to
     * 
     * @return bool
     */
    public function copy($file,$to) : bool
    {
        return $this->fileSystem->copy($file,$to);
    }

    /**
     * Moving the file to another directory.
     * 
     * @param $file
     * @param $to
     * 
     * @return bool
     */
    public function move($file,$to) : bool
    {
        return $this->fileSystem->move($file,$to);
    }

    /**
     * Creating new directory.
     * 
     * @param $path
     * @param $name
     * 
     * @return bool
     */
    public function mkdir($path, $name, $mode = null) : bool
    {
        return $this->fileSystem->mkdir($path, $name, $mode = null);
    }

    /**
     * Determine if it's a directory.
     * 
     * @param $directory
     * 
     * @return bool
     */
    public function isDirectory($directory) : bool
    {
        return $this->fileSystem->isDirectory($directory);
    }

    /**
     * Deleting an empyt directory
     * 
     * @param $directory
     * 
     * @return bool
     */
    public function deleteDirectory($directory) : bool
    {
        return $this->fileSystem->deleteDirectory($directory);
    }
    
}
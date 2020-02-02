<?php

namespace FileSystem;

class File
{
    protected $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
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
        return $this->storage->exists($file);
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
        return $this->storage->isFile($file);
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
        return $this->storage->size($file);
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
        return $this->storage->lastModified($file);
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
        return $this->storage->getExtension($file);
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
        return $this->storage->isExtension($file, $extension);
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
        return $this->storage->delete($file);
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
        return $this->storage->copy($file,$to);
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
        return $this->storage->move($file,$to);
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
        return $this->storage->mkdir($path, $name, $mode = null);
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
        return $this->storage->isDirectory($directory);
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
        return $this->storage->deleteDirectory($directory);
    }

    /**
     * Force directory deleting.
     * 
     * @param $directory
     * 
     * @return bool
     */
    public function forceDeleteDirectory($directory) : bool
    {
        return $this->storage->forceDeleteDirectory($directory);
    }

    /**
     * Rename the file or directory
     * 
     * @param $fileOrDirectory
     * @param $newName
     * 
     * @return bool
     */
    public function rename($fileOrDirectory, $newName) : bool
    {
        return $this->storage->rename($fileOrDirectory, $newName);
    }

    /** */
    public function download($directory){}

    /** */
    public function upload($directory){}
 
    /** */
    public function read($file){}
 
    /** */
    public function canRead($file){}
 
    /** */
    public function get($file){}
 
    /** */
    public function getPath($file){}
    
}
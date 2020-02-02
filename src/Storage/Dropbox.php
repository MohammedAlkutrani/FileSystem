<?php 

namespace FileSystem\Storage;

use FileSystem\StorageInterface;
use Spatie\Dropbox\Client;

class Dropbox implements StorageInterface
{   
    // 'vMEDM7QEDBEAAAAAAAAAMuCpENmb9RLzbzeQmpoXi-nw0agSKKxnuxG3CGU7LAEL'
    /**
     * Determine if file is exists.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function exists($file) : bool
    {
        return true;
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
        return true;
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
        return 0;
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
        return 1;
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
        return 'man';
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
        return true;
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
        return true;
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
        return true;
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
        return true;
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
        return true;
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
        return true;
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
        return true;
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
        return true;
    }

    /**
     * Rename the file or directory
     * 
     * @param $fileOrDirectory
     * 
     * @return bool
     */
    public function rename($fileOrDirectory, $newName) : bool
    {
        return true;
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

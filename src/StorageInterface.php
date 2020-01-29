<?php 

namespace FileSystem;

interface StorageInterface
{
    /**
     * Write in file even if not exists.
     * 
     * @param $file
     * @param $content 
     * 
     * @return bool
     */
    public function writeOrCreate($file, $content) : bool;

    /**
     * Determine if file is writable.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function isWritable($file) : bool;

    /**
     * Determine if file is exists.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function exists($file) : bool;

    /**
     * Write in file.
     * 
     * @param $file
     * @param $content
     * 
     * @return bool
     */
    public function write($file, $content) : bool;

    /**
     * Determine if it's a file.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function isFile($file) : bool;

    /**
     * Getting file size.
     * 
     * @param $file
     * 
     * @return int
     */
    public function size($file) : int;

    /**
     * Getting the last access time.
     * 
     * @param $file
     * 
     * @return int
     */
    public function lastModified($file) : int;

    /**
     * Returns the type of the given file.
     * 
     * @param $file
     * 
     * @return string
     */
    public function getExtension($file) : string;

    /**
     * Check for the given extension.
     * 
     * @param $file
     * @param $extension
     * 
     * @return bool
     */
    public function isExtension($file, $extension) : bool;

    /**
     * Delete the given file.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function delete($file) : bool;

    /**
     * Copy the file to given directory.
     * 
     * @param $file
     * @param $to
     * 
     * @return bool
     */
    public function copy($file,$to) : bool;

    /**
     * Moving the file to another directory.
     * 
     * @param $file
     * @param $to
     * 
     * @return bool
     */
    public function move($file,$to) : bool;

    /**
     * Creating new directory.
     * 
     * @param $path
     * @param $name
     * 
     * @return bool
     */
    public function mkdir($path, $name, $mode = null) : bool;

    /**
     * Determine if it's a directory.
     * 
     * @param $directory
     * 
     * @return bool
     */
    public function isDirectory($directory) : bool;

    /**
     * Deleting an empyt directory.
     * 
     * @param $directory
     * 
     * @return bool
     */
    public function deleteDirectory($directory) : bool;

    /**
     * Force directory deleting.
     * 
     * @param $directory
     * 
     * @return bool
     */
    public function forceDeleteDirectory($directory) : bool;
    // public function download($directory) : bool;
    // public function upload($directory) : bool;
    // public function read($file);
    // public function canRead($file) : bool;
    // public function remane($file,$name);
    // public function get($file);
    // public function getPath($file);
}
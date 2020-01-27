<?php 

namespace FileSystem;

interface FileInterface
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
    // public function read($file);
    // public function canRead($file) : bool;
    // public function remane($file,$name);
    // public function get($file);
    // public function delete($file);
    // public function isExtension($file);
    // public function move($file,$path);
    // public function getPath($file);
    // public function isDirectory($file);

}
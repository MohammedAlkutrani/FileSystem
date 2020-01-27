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
    public function isWritable($file) : bool;
    // public function write($file, $content);
    // public function read($file);
    // public function canRead($file) : bool;
    // public function isFile($file) : bool;
    // public function lastModified($file) : bool;
    // public function size($file);
    // public function exists($file):bool;
    // public function remane($file,$name);
    // public function get($file);
    // public function delete($file);
    // public function getExtension($file);
    // public function isExtension($file);
    // public function move($file,$path);
    // public function getPath($file);
    // public function isDirectory($file);

}
<?php 

namespace FileSystem\System;

use FileSystem\FileInterface;

class Local implements FileInterface
{   
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
        if(!file_exists($file))
        {
            touch($file);
            return $this->writeOrCreate($file,$content);
        }
        
        if(!file_put_contents($file, $content.PHP_EOL, FILE_APPEND | LOCK_EX))
        {
            return false;
        }

        return true;
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
        return is_writable($file);
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
        return file_exists($file);
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
        if(!$this->exists($file) || !$this->isWritable($file)) {
            return false;
        }

        return $this->writeOrCreate($file,$content);
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
        return is_file($file);
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
        return filesize($file);
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
        return fileatime($file);
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
        return mime_content_type($file);
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
        return $this->getExtension($file) == $extension;
    }
}
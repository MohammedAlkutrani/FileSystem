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
 
}
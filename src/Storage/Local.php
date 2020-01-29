<?php 

namespace FileSystem\Storage;

use FileSystem\StroageInterface;

class Local implements StroageInterface
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

    /**
     * Delete the given file.
     * 
     * @param $file
     * 
     * @return bool
     */
    public function delete($file) : bool
    {
        return unlink($file);
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
        return copy($file,$to);
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
        if(!$this->copy($file,$to)) {
            return false;
        }
        
        if(!$this->delete($file)) {
            $this->delete($to);
            return false;
        }

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
        if($this->isDirectory($path.DIRECTORY_SEPARATOR.$name))
        {
            return false;
        }

        if(!$mode) {
            return mkdir($path.DIRECTORY_SEPARATOR.$name);
        }
        
        return mkdir($path.DIRECTORY_SEPARATOR.$name, $mode);
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
        return is_dir($directory);
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
        if(!$this->isDirectory($directory)) {
            return false;
        }

        $directoryContent = array_diff(scandir($directory),['.','..']);

        if($directoryContent) {
            return false;
        }

        return rmdir($directory);
    }
}
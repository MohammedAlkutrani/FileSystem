<?php 

namespace FileSystem\Storage;

use FileSystem\StorageInterface;
use FileSystem\Utility;

class Local implements StorageInterface
{   
    
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

    /**
     * Force directory deleting.
     * 
     * @param $directory
     * 
     * @return bool
     */
    public function forceDeleteDirectory($directory) : bool
    {
        if($this->isFile($directory)) {
            return false; 
        }

        if (!$this->deleteDirectory($directory)) {
            $directoryContent = array_diff(scandir($directory), ['.','..']);
            
            foreach ($directoryContent as $content) {
                if(!$this->isDirectory($directory.DIRECTORY_SEPARATOR.$content)) {
                    $this->delete($directory.DIRECTORY_SEPARATOR.$content);
                } else {    
                    $this->forceDeleteDirectory($directory.DIRECTORY_SEPARATOR.$content);
                }
            }
        }

        if($this->isDirectory($directory)) {
            return $this->deleteDirectory($directory);
        }

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
        $path = Utility::getRootDirectory($fileOrDirectory);
        var_dump($path);
        return rename($fileOrDirectory, $path.DIRECTORY_SEPARATOR.$newName);
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

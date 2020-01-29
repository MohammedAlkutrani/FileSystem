<?php

namespace FileSystem;

class Utility
{
    public static function getRootDirectory($path)
    {
        $array = explode(DIRECTORY_SEPARATOR, $path);
        array_pop($array);
        $rootPath = implode(DIRECTORY_SEPARATOR, $array);
        return $rootPath;
    }
}
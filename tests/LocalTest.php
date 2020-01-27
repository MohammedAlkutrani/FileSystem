<?php

namespace Test\FileSystem;

use FileSystem\File;
use FileSystem\System\Local;
use PHPUnit\Framework\TestCase;

class LocalTest extends TestCase
{
    public function testWriteOrCreate()
    {
        $file = new File(new Local);
        $isCreated = $file->writeOrCreate(__DIR__.'/../files/man.txt','mohammed');
        $this->assertEquals(true,$isCreated);
    }

    public function testIsWriteable()
    {
        $file = new File(new Local);
        $isWriteable = $file->isWritable(__DIR__.'/../files/man.txt');
        $this->assertEquals(true,$isWriteable);
    }

    public function testExists()
    {
        $file = new File(new Local);
        $isExists = $file->exists(__DIR__.'/../files/man.txt');
        $this->assertEquals(true,$isExists);
    }

    public function testWrite()
    {
        $file = new File(new Local);
        $isCreated = $file->write(__DIR__.'/../files/man.txt','new contant');
        $this->assertEquals(true,$isCreated);
    }

    public function testIsFile()
    {
        $file = new File(new Local);
        $isFile = $file->isFile(__DIR__.'/../files/man.txt');
        $this->assertEquals(true,$isFile);
    }

    public function testFileSize()
    {
        $file = new File(new Local);
        $fileSize = $file->size(__DIR__.'/../files/man.txt');
        $this->assertEquals($file->size(__DIR__.'/../files/man.txt'),$fileSize);
    }

    public function testLastModified()
    {
        $file = new File(new Local);
        $lastModified = $file->lastModified(__DIR__.'/../files/man.txt');
        $this->assertEquals($file->lastModified(__DIR__.'/../files/man.txt'),$lastModified);
    }

    public function testGetExtension()
    {
        $file = new File(new Local);
        $extension = $file->getExtension(__DIR__.'/../files/man.txt');
        $this->assertEquals('text/plain',$extension);
    }
}
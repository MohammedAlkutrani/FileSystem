<?php

namespace Test\FileSystem;

use FileSystem\File;
use FileSystem\Storage\Local;
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

    public function testIsExtension()
    {
        $file = new File(new Local);
        $isExtension = $file->isExtension(__DIR__.'/../files/man.txt','text/plain');
        $this->assertEquals(true,$isExtension);
    }

    public function testDelete()
    {
        $file = new File(new Local);
        $isCreated = $file->writeOrCreate(__DIR__.'/../files/deleted.txt','mohammed');
        $this->assertEquals(true,$isCreated);

        $isDeleted = $file->delete(__DIR__.'/../files/deleted.txt');
        $this->assertEquals(true,$isDeleted);
    }

    public function testCopy()
    {
        $file = new File(new Local);
        $isCopied = $file->copy(__DIR__.'/../files/man.txt',__DIR__.'/../files/manCopy.txt');
        $this->assertEquals(true,$isCopied);
    }

    public function testMove()
    {
        $file = new File(new Local);
        $isMoved = $file->move(__DIR__.'/../files/man.txt',__DIR__.'/../file/man.txt');
        $this->assertEquals(true,$isMoved);
    }

    public function testMkdir()
    {
        $file = new File(new Local);
        $isCreated = $file->mkdir(__DIR__.'/../files','moh');
        $this->assertEquals(true,$isCreated);
    }

    public function testIsDirectory()
    {
        $file = new File(new Local);
        $isIt = $file->isDirectory(__DIR__.'/../files/moh');
        $this->assertEquals(true,$isIt);
    }

    public function testDeleteDirectory()
    {
        $file = new File(new Local);
        $isDeleted = $file->deleteDirectory(__DIR__.'/../files/moh');
        $this->assertEquals(true,$isDeleted);
    }
}
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
}
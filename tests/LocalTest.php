<?php

namespace Test\FileSystem;

use FileSystem\File;
use FileSystem\System\Local;
use PHPUnit\Framework\TestCase;

class LocalTest extends TestCase
{
    public function testWrite()
    {
        $file = new File(new Local);
        $isCreated = $file->writeOrCreate(__DIR__.'/../files/man.txt','mohammed');
        $this->assertEquals(true,$isCreated);
    }

    public function testIsWriteable()
    {
        $file = new File(new Local);
        $isCreated = $file->isWritable(__DIR__.'/../files/man.txt');
        $this->assertEquals(true,$isCreated);
    }
}
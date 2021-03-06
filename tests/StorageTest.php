<?php
namespace Proner\StorageTest;

use PHPUnit\Framework\TestCase;
use Proner\Storage\Storage;

class StorageTest extends TestCase
{
    private $storage;

    protected function setUp()
    {
        $this->storage = new Storage('local');
        $this->storage->setWorkdirLocal(__DIR__ . PS_DS . '..' . PS_DS . 'temp' . PS_DS);
        $this->storage->setWorkdirRemote(__DIR__ . PS_DS . '..' . PS_DS . 'temp' . PS_DS);
    }

    public function testPutContentFile()
    {
        $actual = $this->storage->putContent('file_test.txt', 'test passed');
        $this->assertEquals(true, $actual);
    }

    public function testGetFile()
    {
        $actual = $this->storage->get('file_test.txt', '.', 'file_test2.txt');
        $this->assertEquals(true, $actual);
    }

    public function testPutFile()
    {
        $actual = $this->storage->put('file_test.txt', '.');
        $this->assertEquals(true, $actual);
    }

    public function testGetContentFile()
    {
        $actual = $this->storage->getContent('file_test.txt');
        $this->assertEquals('test passed', $actual);
    }

    public function testFileExist()
    {
        $actual = $this->storage->fileExists('file_test.txt');
        $this->assertEquals(true, $actual);
    }

    public static function tearDownAfterClass()
    {
        unlink(__DIR__ . PS_DS . '..' . PS_DS . 'temp' . PS_DS . 'file_test.txt');
        unlink(__DIR__ . PS_DS . '..' . PS_DS . 'temp' . PS_DS . 'file_test2.txt');
    }
}

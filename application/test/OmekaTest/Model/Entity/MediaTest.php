<?php
namespace OmekaTest\Model;

use Omeka\Model\Entity\File;
use Omeka\Model\Entity\Item;
use Omeka\Model\Entity\Media;
use Omeka\Test\TestCase;

class MediaTest extends TestCase
{
    protected $media;

    public function setUp()
    {
        $this->media = new Media;
    }

    public function testInitialState()
    {
        $this->assertNull($this->media->getId());
        $this->assertNull($this->media->getType());
        $this->assertNull($this->media->getData());
        $this->assertFalse($this->media->isPublic());
        $this->assertNull($this->media->getFilename());
        $this->assertNull($this->media->getItem());
    }

    public function testSetType()
    {
        $type = 'test-type';
        $this->media->setType($type);
        $this->assertEquals($type, $this->media->getType());
    }

    public function testSetData()
    {
        $data = 'test-data';
        $this->media->setData($data);
        $this->assertEquals($data, $this->media->getData());
    }

    public function testSetIsPublic()
    {
        $this->media->setIsPublic(true);
        $this->assertTrue($this->media->isPublic());
    }

    public function testSetFilename()
    {
        $filename = 'foo.jpg';
        $this->media->setFilename($filename);
        $this->assertEquals($filename, $this->media->getFilename());
    }

    public function testSetItem()
    {
        $item = new Item;
        $this->media->setItem($item);
        $this->assertSame($item, $this->media->getItem());
        $this->assertTrue($item->getMedia()->contains($this->media));
    }
}
<?php

namespace Skipper\Nagoya8;

class Nagoya8Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Nagoya8
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new Nagoya8;
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\Skipper\Nagoya8\Nagoya8', $actual);
    }

    public function testException()
    {
        $this->setExpectedException('\Skipper\Nagoya8\Exception\LogicException');
        throw new Exception\LogicException;
    }
}

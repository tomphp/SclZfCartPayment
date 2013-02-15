<?php
namespace SclZfCartPayment\Exception;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-15 at 19:15:03.
 */
class InvalidArgumentExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InvalidArgumentException
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new InvalidArgumentException(
            'abc',
            7,
            'setUp',
            23
        );
    }

    public function testMessage()
    {
        $this->assertEquals('setUp expected abc on line 23; got "integer"', $this->object->getMessage());
    }
}

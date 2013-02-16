<?php
namespace SclZfCartPayment\Method;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-16 at 00:29:05.
 */
class ConfigFetcherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ConfigFetcher
     */
    protected $object;

    /**
     * @var \SclZfCartPayment\Method\MethodLoaderInterface
     */
    protected $loader;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->loader = $this->getMock('SclZfCartPayment\Method\MethodLoaderInterface');

        $this->object = new ConfigFetcher($this->loader, array());
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers SclZfCartPayment\Method\ConfigFetcher::listMethods
     * @todo   Implement testListMethods().
     */
    public function testListMethods()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers SclZfCartPayment\Method\ConfigFetcher::getMethod
     * @todo   Implement testGetMethod().
     */
    public function testGetMethod()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
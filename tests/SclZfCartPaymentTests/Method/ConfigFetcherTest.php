<?php
namespace SclZfCartPaymentTests\Method;

use SclZfCartPayment\Method\ConfigFetcher;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-16 at 00:29:05.
 */
class ConfigFetcherTest extends \PHPUnit_Framework_TestCase
{
    protected $config = array(
        'payment_methods' => array(
            'the_method1' => 'method1_service',
            'the_method2' => 'method2_service',
        ),
    );

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

        $this->object = new ConfigFetcher($this->loader, $this->config);
    }

    /**
     * @covers SclZfCartPayment\Method\ConfigFetcher::listMethods
     * @covers SclZfCartPayment\Method\ConfigFetcher::__construct
     */
    public function testListMethods()
    {
        $method1 = $this->getMock('SclZfCartPayment\PaymentMethodInterface');
        $method1->expects($this->any())->method('name')->will($this->returnValue('method1_result'));

        $this->loader->expects($this->at(0))
            ->method('getMethod')
            ->with($this->equalTo('method1_service'))
            ->will($this->returnValue($method1));

        $method2 = $this->getMock('SclZfCartPayment\PaymentMethodInterface');
        $method2->expects($this->any())->method('name')->will($this->returnValue('method2_result'));

        $this->loader->expects($this->at(1))
            ->method('getMethod')
            ->with($this->equalTo('method2_service'))
            ->will($this->returnValue($method2));

        $result = $this->object->listMethods();

        $expected = array(
            'the_method1' => 'method1_result',
            'the_method2' => 'method2_result',
        );

        $this->assertEquals($expected, $result);
    }

    /**
     * @covers SclZfCartPayment\Method\ConfigFetcher::getMethod
     */
    public function testGetMethod()
    {
        $this->loader->expects($this->once())
            ->method('getMethod')
            ->with($this->equalTo('method1_service'))
            ->will($this->returnValue('the_result'));

        $result = $this->object->getMethod('the_method1');

        $this->assertEquals('the_result', $result);
    }
}

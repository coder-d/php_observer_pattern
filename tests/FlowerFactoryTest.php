<?php 
	namespace Tests;
	use DesignPatterns\Observer\User;
	use DesignPatterns\Observer\UserObserver;
	use PHPUnit\Framework\TestCase;

	require_once (__DIR__ .'/../src/Flowers/FlowerFactory.php');

	class FlowerFactoryTest extends TestCase
	{

	    public function testCall()
	    {
	        $flowerFactoryInstance = new \FlowerFactory();
	        $this->assertEquals('FlowerFactory', get_class($flowerFactoryInstance));
	        //Call/make flower type 1
	        $flowerTypeInstance = $flowerFactoryInstance->call("1");
	        $this->assertEquals('FlowerType1',get_class($flowerTypeInstance));
	        //After being called flowerType1 fed count should be updated to 1
	        $this->assertEquals(1,$flowerTypeInstance->getTimesFed());
	        //After updating fed count to 10, call to the flower should return false
	        for($i = 1;$i < 10;$i++)
	        {
	        	$flowerTypeInstance->feed();
	        }
	        $this->assertEquals(false,$flowerFactoryInstance->call("1"));

	    }
	}
<?php
	
	namespace Tests;
	use DesignPatterns\Observer\User;
	use DesignPatterns\Observer\UserObserver;
	use PHPUnit\Framework\TestCase;

	require_once (__DIR__ .'/../src/Observer.php');
	require_once (__DIR__ .'/../src/SplObserverImplementation.php');

	class FlowerRequestTest extends TestCase
	{
		

		public function testConstructor()
		{	//in _construct FlowerFactory expected to be initialised and 
			//availableFlowersOver should be set to 0
			$flowerFactoryInstance = new \FlowerFactory();
			$flowerRequestInstance = new \FlowerRequest();
			$this->assertEquals($flowerFactoryInstance,$flowerRequestInstance->getFlowerFactory());
			$this->assertEquals(0,$flowerRequestInstance->getAvailableFlowersOver());
		}

		public function testUpdate()
		{
			//if honeybird FeedStatus is false, call to update() should return true
			$flowerRequestInstance = new \FlowerRequest();
			$sun = new \Sun();
			$sunMgr = new \SunManager($sun);
			$sunMgr->updateHoneyBirdFeedStatus(false);
			$honeyBird  = new \HoneyBird();
			$observers = new \SplObjectStorage();
			$observers->attach($honeyBird);
			$this->assertEquals(true,$flowerRequestInstance->update($sunMgr));
			//if this is the first call to update() expecting $this->availableFlowers
			//to be initialised with list of 10 flowers
			$sunMgr->updateHoneyBirdFeedStatus(true);
			$flowerRequestInstance->update($sunMgr);
			for($i = 1;$i <= 10;$i++)
	  		{
	  			$availableFlowers[$i] = 1;
	  		}
	  		$this->assertEquals($availableFlowers,$flowerRequestInstance->getAvailableFlowers());
	  		//if availableFlowersOver is 1 then the subjects's updateFlowersAvailability
	  		//should be updated to false
	  		$flowerRequestInstance->updateAvailableFlowersOver(1);
	  		$flowerRequestInstance->update($sunMgr);
	  		$this->assertEquals(false,$sunMgr->getFlowersAvailability());
	  	}	
	}
	class HoneyBirdTest extends TestCase
	{
		public function testConstructor()
		{
			//on initialization timesFed should be set to 0
			$honeyBird  = new \HoneyBird();
			$this->assertEquals(0,$honeyBird->getTotalFeedCount());
			//if the Subject's which in this case is the SunManager
			//HoneyBirdFeedStatus is set to false HoneyBird should not call feed()
			//and feed count should be same as before
			$sun = new \Sun();
			$sunMgr = new \SunManager($sun);
			$sunMgr->updateHoneyBirdFeedStatus(false);
			$honeyBird->update($sunMgr);
			$this->assertSame(0,$honeyBird->getTotalFeedCount());
			//if the Subject's which in this case is the SunManager
			//HoneyBirdFeedStatus is set to true HoneyBird should call feed()
			//and feed count should be increased by 1
			$sunMgr->updateHoneyBirdFeedStatus(true);
			$honeyBird->update($sunMgr);
			$this->assertSame(1,$honeyBird->getTotalFeedCount());

		}
	}
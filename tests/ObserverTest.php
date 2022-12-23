<?php
	
	namespace Tests;
	use DesignPatterns\Observer\User;
	use DesignPatterns\Observer\UserObserver;
	use PHPUnit\Framework\TestCase;

	require_once (__DIR__ .'/../src/Observer.php');

	class SunManagerTest extends TestCase
	{
		public function testInitialisation()
		{
			$sun = new \Sun();
			$sunMgr = new \SunManager($sun);
			//After initialisation Day counter and hour counter should be zero
			$this->assertEquals(0,$sunMgr->getCurrentDay());
			$this->assertEquals(0,$sunMgr->getCurrentHour());
			//After initialisation honeyBirdWantsToFeed should be false
			//and flowersAvailable should be true
			$this->assertEquals(false,$sunMgr->getHoneyBirdFeedStatus());
			$this->assertEquals(true,$sunMgr->getFlowersAvailability());
		}

		public function testOnDayStart()
		{
			
			//after call to onDayStart Day counter should be 1 and 
			//honeyBirdWantsToFeed should be true
			$sun = new \Sun();
			$sunMgr = new \SunManager($sun);
			$sunMgr->onDayStart();
			$this->assertEquals(1,$sunMgr->getCurrentDay());
			$this->assertEquals(true,$sunMgr->getHoneyBirdFeedStatus());
		}
		public function testOnHourChange()
		{
			//if $this->flowersAvailable is set to false
			//call to testOnHourChange() should return false
			$sun = new \Sun();
			$sunMgr = new \SunManager($sun);
			$sunMgr->updateFlowersAvailability(false);
			$this->assertEquals(false,$sunMgr->onHourChange());
			//call to testOnHourChange() should increase hourCounter by 1
			$sunMgr->updateFlowersAvailability(true);
			$hourCounterBeforeCall = $sunMgr->getCurrentHour();
			$sunMgr->onHourChange();
			$this->assertEquals($hourCounterBeforeCall+1,$sunMgr->getCurrentHour());
			//if hourCounter is more than 12 $this->honeyBirdWantsToFeed should be set
			//to false
			for($i = 1;$i < 13;$i++)
	        {
	        	$sunMgr->updateHourCounter();
	        }
	        $sunMgr->onHourChange();
	        $this->assertEquals(false,$sunMgr->getHoneyBirdFeedStatus());
		}
		public function testOnDayEnd()
		{
			//if $this->flowersAvailable is set to false
			//call to OnDayEnd() should return false
			$sun = new \Sun();
			$sunMgr = new \SunManager($sun);
			$sunMgr->updateFlowersAvailability(false);
			$this->assertEquals(false,$sunMgr->onDayEnd());
			//call to OnDayEnd() should reset hour counter to 0
			$sunMgr->updateFlowersAvailability(true);
			$sunMgr->onDayEnd();
			$this->assertEquals(0,$sunMgr->getCurrentHour());

		}

	}
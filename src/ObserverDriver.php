<?php

	require_once('SplObserverImplementation.php');
	require_once("Observer.php");

	$flowerType = new FlowerRequest;
	$honeyBird = new HoneyBird;
	$counter = 0;
	echo "<br>";

	$sun = new Sun();
	//SunManger in this case is the subject class to which observers are attched
	$sunMgr = new SunManager($sun);
	$sunMgr->attach($honeyBird);
	$sunMgr->attach($flowerType);
	$flowersAvailable = true;
	do{
		$sunDayStart = $sun->startDay();
		$sunMgr->onDayStart($sunDayStart);
		$counter++;
		$flowersAvailable = $sunMgr->getFlowersAvailability();
		if(!$flowersAvailable)
		{	
			stopProcess($sunMgr,$counter);
			return true;
		}

		for($i = 1;$i < 25; $i++)
		{	
			$honeyBirdFeedStatus = $i > 12 ? 'false':'true';
			$sunHourChange = $sun->hourChange();
			$sunMgr->onHourChange($sunHourChange);
			$counter++;
			$flowersAvailable = $sunMgr->getFlowersAvailability();
			if(!$flowersAvailable)
			{
				stopProcess($sunMgr,$counter);
				return true;
			}
		}
		$sunDayEnd = $sun->endDay();
		$sunMgr->onDayEnd($sunDayEnd);
		$counter++;
		$flowersAvailable = $sunMgr->getFlowersAvailability();
	}while($flowersAvailable);

	function stopProcess($sunMgr,$counter)
	{
		$currentDay = $sunMgr->getCurrentDay() - 1;
		echo "DAY END($currentDay))\n <br/><br/>";
		echo "\n\n <br/><br/>EXIT ($counter)";
	}
	

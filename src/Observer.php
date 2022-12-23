<?php
class SunManager implements SplSubject
{
    private $sunActivityTrigger;
    private $observers;
    private $dayCounter;
    private $hourCounter;
    private $noOfFlowersToUse;
    private $honeyBirdWantsToFeed;
    private $flowersAvailable;

    public function __construct($newSun, $noOfFlowersToUse = 10)
    {
        $this->observers = new SplObjectStorage();
        $this->dayCounter = 0;
        $this->hourCounter = 0;
        $this->notify();
        $this->noOfFlowersToUse = $noOfFlowersToUse;
        $this->honeyBirdWantsToFeed = false;
        $this->flowersAvailable = true;
    }
    /**
     *
     * Update the day counter, notify the attached observers
     * @param    null
     * @return      false, print message
     *
     */

    public function onDayStart()
    {
        if (!$this->flowersAvailable)
        {
            echo "DAY END($this->dayCounter)\n <br/><br/>";
            return false;
        }
        echo "DAY START($this->dayCounter)\n <br/><br/>";
        $this->dayCounter += 1;
        $this->honeyBirdWantsToFeed = true;
        echo "HOUR CHANGE (0)\n <br/>";
        $this->notify();
    }

    /**
     *
     * Update the hour counter, notify the attached observers
     * @param    null
     * @return      false, print message
     *
     */

    public function onHourChange()
    {
        if (!$this->flowersAvailable)
        {
            return false;
        }
        $this->hourCounter += 1;
        echo "HOUR CHANGE ($this->hourCounter) \n <br/>";
        if ($this->hourCounter > 12)
        {
            $this->honeyBirdWantsToFeed = false;
        }
        $this->notify();
        echo "\n <br/>";
    }
    /**
     *
     * reset the hour counter to 0, notify the attached observers
     * @param    null
     * @return      false, print message
     *
     */
    public function onDayEnd()
    {
        if (!$this->flowersAvailable)
        {
            echo "DAY END($this->dayCounter)\n <br/><br/>";
            return false;
        }
        $this->hourCounter = 0;
        $dayCounter = $this->dayCounter - 1;
        echo "DAY END($dayCounter)\n <br/><br/>";

    }

    public function getNoOfFlowersToUse():int
    {
        return $this->noOfFlowersToUse;
    }

    public function getCurrentDay():int
    {
        return $this->dayCounter;
    }

    public function getCurrentHour():int
    {
        return $this->hourCounter;
    }

    public function getHoneyBirdFeedStatus()
    {
        return $this->honeyBirdWantsToFeed;
    }

    public function updateHoneyBirdFeedStatus($status):void
    {
        $this->honeyBirdWantsToFeed = $status;
    }

    public function updateHourCounter()
    {
        $this->hourCounter += 1;
    }

    public function updateFlowersAvailability($available)
    {
        $this->flowersAvailable = $available;
    }

    public function getFlowersAvailability()
    {
        return $this->flowersAvailable;
    }

    //SplSubject interface functions
    public function attach(splObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(splObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            //$this will give the self instance which is the SunManager instance to each observer
            $observer->update($this);
        }

    }
}

class Sun
{
    private $dayStart;
    private $dayEnd;
    private $currentHour;

    public function __construct()
    {
        // $this->dayStart = $dayStart;
        // $this->dayEnd = $dayEnd;
        //$this->currentHour = $currentHour;
        
    }

    public function startDay()
    {
        //return $this->dayStart;
        
    }
    public function endDay()
    {
        //return $this->dayEnd;
        
    }
    public function hourChange()
    {

    }
}


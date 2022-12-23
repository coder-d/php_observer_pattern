<?php
require_once (__DIR__ . '/Flowers/FlowerFactory.php');

class FlowerRequest implements splObserver
{
    protected $flowerRequests;
    protected $availableFlowers;
    protected $flower;
    protected $availableFlowersOver;
    // First, create the FlowerFactory object in the constructor.
    public function __construct()
    {
        $this->flower = new FlowerFactory();
        $this->availableFlowersOver = 0;
        $this->flowerRequests = array();
        $this->availableFlowers = array();
    }

    /**
     *
     * Make a list of available flowers
     * Selected a random flowerType and feed on it tills its feedable
     * @param    splSubject $subject with which the obversers are attached
     * @return      true,false or flowerObject
     *
     */

    public function update(splSubject $subject)
    {

        if ($subject->getHoneyBirdFeedStatus() == false)
        {
            return true;
        }

        if (empty($this->availableFlowers) && $this->availableFlowersOver != 1)
        {

            for ($i = 1;$i <= $subject->getNoOfFlowersToUse();$i++)
            {
                //list of flowers available
                $this->availableFlowers[$i] = 1;
            }
        }
        elseif ($this->availableFlowersOver == 1)
        {
            $subject->updateFlowersAvailability(false);
            echo "ALL FLOWERS ARE EMPTY \n <br/><br/>";
            return false;
        }
        do
        {

            $flowerTypeToCall = array_rand($this->availableFlowers, 1);
            $flower = $this->request($flowerTypeToCall);
            //check if any flower is available
            if (empty($this->availableFlowers))
            {
                $this->availableFlowersOver = 1;
            }
        }
        while (!$flower && $this->availableFlowersOver != 1);
    }

    /**
     *
     * Call the desired flowerType
     * unset the flowerType from the availble Fower list if the no longer feedable
     * Selected a random flowerType and feed on it tills its feedable
     * @param    flowerType $type
     * @return      flowerTypeObject or false
     *
     */

    private function request($type = null)
    {
        $flower = null;
        // Use the call() method from the FlowerFactory.
        $flower = $this
            ->flower
            ->call($type);
        if (!$flower && $this->availableFlowersOver != 1)
        {
            unset($this->availableFlowers[$type]);
            echo "FLOWER -" . $type . " (0)\n \n <br/><br/>";
            if (!$this->availableFlowers)
            {
                $this->availableFlowersOver = 1;
            }
            return false;
        }
        else
        {
            //Check if this was the last time the Flower could be fed on
            if (10 == $flower->getTimesFed())
            {
                unset($this->availableFlowers[$type]);
            }
            return $flower;
        }
    }
    // Use the get() method from the FlowerFactory.
    public function get($type)
    {
        return $this
            ->flower
            ->get($type);
    }

    public function getFlowerFactory()
    {
        return $this->flower;
    }

    public function getFlowerRequests()
    {
        return $this->flowerRequests;
    }
    public function getAvailableFlowers()
    {
        return $this->availableFlowers;
    }
    public function getAvailableFlowersOver()
    {
        return $this->availableFlowersOver;
    }
    public function updateAvailableFlowers($flowerList)
    {
        $this->availableFlowers = $flowerList;
    }
    public function updateAvailableFlowersOver($state)
    {
        $this->availableFlowersOver = $state;
    }
}

class HoneyBird implements splObserver
{

    protected $timesFed;

    function __construct()
    {
        $this->timesFed = 0;
    }

    public function update(splSubject $subject)
    {
        if ($subject->getHoneyBirdFeedStatus() == false)
        {
            return $this->sleep();
        }
        else
        {
            return $this->feed();
        }
    }

    private function feed()
    {
        $this->timesFed += 1;
    }

    private function sleep()
    {
        echo "SLEEP\n <br/>";
    }

    public function getTotalFeedCount()
    {
        return $this->timesFed;
    }
}
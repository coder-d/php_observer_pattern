<?php
require_once (__DIR__ . '/flowerCollection.php');
class FlowerFactory
{

    protected $flowerInstances = array();
    protected $flowers = array();

    /**
     * Determine which flower to call
     * Create the requested FlowerType instance if not already created
     * add the FlowerType instance in the flowerInstance list
     * call the flowerType feed function to update the feds
     * @param    $type 1-10
     * @return      false, flowerType instance
     *
     */

    public function call($type = null)
    {

        ${'class' . $type} = 'FlowerType' . $type;
        //Need to check if an instance of the $type is already created or not
        //before creating a new one. If its already created then just need to update the
        //fed count
        if (!$this->flowers)
        {
            $this->flowers[$type] = array(${'class' . $type});
            $this->flowerInstances[$type] = new ${'class' . $type}();
        }
        if (!in_array(${'class' . $type}, $this->flowers))
        {
            $this->flowerInstances[$type] = new ${'class' . $type}();
            $this->flowers[$type] = ${'class' . $type};
        }
        $flowerFeedCount = $this->getFeed($this->flowerInstances[$type]);
        if ($flowerFeedCount < 10)
        {
            $this->updateFeed($this->flowerInstances[$type]);
            //Check if this is the was the last feed,then feed count would be 10
            $flowerFeedCount = $this->getFeed($this->flowerInstances[$type]);
            echo "FLOWER -" . $type . " (" . (10 - $flowerFeedCount) . ")\n \n <br/><br/>";
            return $this->flowerInstances[$type];
        }
        else
        {
            unset($this->flowerInstances[$type]);
            unset($this->flowers[$type]);
            return false;
        }
    }

    private function updateFeed($flowerInstance):void
    {
        $flowerInstance->feed();
    }

    public function getFeed($flowerInstance):int
    {

        return $flowerInstance->getTimesFed();
    }
}
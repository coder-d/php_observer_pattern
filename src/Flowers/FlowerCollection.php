<?php
	
	interface Flower {

      function feed():void;
	  
	  function getTimesFed();

	  function getType();
	}

	class FlowerType1 implements Flower {

	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	}

	class FlowerType2 implements Flower {

	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	  
	  public function getWheel()
	  {
	    return $this->wheel;
	  }
	  
	  public function hasSunRoof()
	  {
	    return $this->sunRoof;
	  }
	}

	class FlowerType3 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	 
	}

	class FlowerType4 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	}

	class FlowerType5 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	  
	}
	class FlowerType6 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	}
	class FlowerType7 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	}
	class FlowerType8 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	}
	class FlowerType9 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	}
	class FlowerType10 implements Flower {
	  	
	  protected $timesFedOn;

	  function __construct() 
	  {
	  	$this->timesFedOn = 0;
	  }
	  
	  public function getType()
	  {
	    return $this->type;
	  }

	  public function getTimesFed()
	  {
	  	return $this->timesFedOn;
	  }

	  public function feed():void
	  {
	  	$this->timesFedOn += 1;
	  }
	}
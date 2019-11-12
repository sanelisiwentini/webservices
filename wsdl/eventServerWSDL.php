<?php
class eventServerWSDL
{
    protected $events = array(
          1 => array("name" => "IT Conference 2017",
            "date" => 1454994000,
            "location" => "Kuala Lumpur"
        ),
        2 => array("name" => " IT Conference 2018",
            "date" => 1454112000,
            "location" => "Toronto"),
        3 => array("name" => " IT Conference 2019",
            "date" => 1454894800,
            "location" => "Dubai"
        )
    );

    /**
     * Get all the events we know about
     *
     * @return array the collection of events
     */
    public function getEvents() {
        return $this->events;
    }

    /**
     * Fetch the detail for a single event
     *
     * @param int $event_id the identifier of the event
     *
     * @return array The event data
     */
    public function getEventById($event_id) {
        if(isset($this->events[$event_id])) {
            return $this->events[$event_id];
        } else {
            throw new Exception("Event not found");
        }
    }

    public function getEventByIDLoc($event_id, $loc) {
    $arr = array();
        if(isset($this->events[$event_id])) {
            $arr = $this->events[$event_id];

            if($arr['location']==$loc )
             return $this->events[$event_id];
        } else {
            throw new Exception("Event not found");
        }
    }
	
	
	    public function getEventByDate($date) {
    $arr = array();
    $arr = $this->events;   

     foreach($arr as $arrRow){     
      if($arrRow['date']==$date)
           return $arrRow;

     }       
    }

    public function getEventByLoc($loc) {
    $arr = array();
    $arr = $this->events;   

     foreach($arr as $arrRow){     
      if($arrRow['location']==$loc)
           return $arrRow;

     }       
    }
}
?>

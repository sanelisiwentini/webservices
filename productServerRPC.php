<?php
class productServerRPC
{
    protected $products= array(
        1 => array("name" => "Smart Phone 1",
            "price" => 100,
            "year" => 2018
        ),
        2 => array("name" => "Smart Phone 2",
            "price" => 200,
            "year" => 2019
		),
        3 => array("name" => "Smart Phone 3",
            "price" => 300,
            "year" => 2019
        )
    );
    public function getProd() {
        return $this->products;
    }

    public function getProdById($prodID) {
        if(isset($this->products[$prodID])) {
            return $this->products[$prodID];
        } else {
            throw new Exception("Event not found");
        }
    }
    
    public function getProdByPrice($price) {
    $arr = array();
    $arr = $this->products;
 

     foreach($arr as $arrRow){  
      if($arrRow['price']==$price)
           return $arrRow;

     }

    }
}
?>

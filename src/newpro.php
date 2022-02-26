<?php

class produ{
    public $id, $price,$images;
    public function __construct($id,$price,$images){
        $this->id = $id;
        $this->price = $price;
        $this->images = $images;
    }
}

?>
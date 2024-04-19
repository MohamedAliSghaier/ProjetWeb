<?php
  class Product{
    private $Id =null;
    private $Image=null;
    private $Name =null;
    private $Price =null;

    public function __construct($Id, $Name, $Price){
        $this->Id = $Id;
        $this->Name = $Name;
        $this->Price = $Price;
    }

    public function getid(){
        return $this->Id;
    }
    public function getName(){
        return $this->Name;
    }
    public function getPrice(){
        return $this->Price;
    }
    p
    public function getDob(){
        return $this->dob;
    }
    public function setId($Id){
        $this->Id= $Id;
     }
    public function setName($Name){
       $this->Name= $Name;
    }
    public function setPrice($Price){
        $this->Price= $Price;
     }
   
  }

?>
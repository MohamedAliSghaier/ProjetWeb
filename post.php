<?php
  class post{
    private $IdUser=null;
    private $contenuP =null;
    private $IdP =null;
    private $date=null;

    public function __construct(){
    }

  
  
    public function getContenuP(){
        return $this->contenuP;
    }
    public function getIdP(){
        return $this->IdP;
    }
    public function getDate(){
        return $this->date;
    }
    public function getIdUser(){
        return $this->IdUser;
    }

    public function setIdP($IdP){
        $this->IdP = $IdP;
    }
    
    public function setContenuP($contenuP){
       $this->contenuP= $contenuP;
    }
    public function setDate($date){
        $this->date= $date;
     }
     public function setIdUser($IdUser){
        $this->IdUser= $IdUser;
     }
   
  }

?>
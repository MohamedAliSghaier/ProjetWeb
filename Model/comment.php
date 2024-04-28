<?php
  class comment{
    private $Id=null;
    private $contenu =null;
    private $IdP =null;
    private $datee=null;

    public function __construct($IdP,$contenu,$datee){
        $this->IdP = $IdP;
        $this->contenu = $contenu;
        $this->datee = $datee;

     
    }
   

  
  
    public function getcontenu(){
        return $this->contenu;
    }
    public function getIdP(){
        return $this->IdP;
    }
    public function getdate(){
        return $this->datee;
    }

    public function getDob(){
        return $this->dob;
    }
  
     public function setIdP($IdP){
        $this->IdP= $IdP;
     }
    public function setcontenu($contenu){
       $this->contenu= $contenu;
    }
    public function setdate($date){
        $this->datee= $date;
     }
   
  }

?>
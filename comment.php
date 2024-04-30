<?php
  class comment{
    private $Id=null;
    private $contenu =null;
    private $IdP =null;
    private $datee=null;

    public function __construct($contenu){
        $this->contenu = $contenu;
     
    }

  
  
    public function getcontenu(){
        return $this->contenu;
    }
    public function getIdP(){
        return $this->Id;
    }
    public function getDatee(){
        return $this->datee;
    }

  
     public function setId($Id){
        $this->IdP= $Id;
     }
    public function setContenu($contenu){
       $this->contenu= $contenu;
    }
    public function setDatee($datee){
        $this->datee= $datee;
    }
    public function setIdP($IdP){
        $this->IdP = $IdP;
    }
    
   
  }

?>
<?php
  class post{
    private $IdP=null;
    private $id_user=null;
    private $contenu=null;
    private $datee=null;

    public function __construct($contenu){
        $this->contenu = $contenu;
     
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


    public function getid_user(){
       return $this->id_user;
     }
    public function setid_user($id_user){
        $this->id_user= $id_user;
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
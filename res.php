<?php

 class res{

    // private int $NumAbon;
    private $contenu = null;
     private string $id_res;
     private string $id_client;
     private string $statut;

     
 public function  __construct ($contenu) //$a,
    {
    //$this->NumAbon=$a;
    $this->contenu=$contenu;


    }

     public function getcontenu()
    {
        return $this->contenu;
    }
    public function getid_res()
    {
        return $this->id_res;
    }  
    public function getid_client()
    {
        return $this->id_client;
    }   
    public function getstatut()
    {
        return $this->statut;
    }


 }

?>
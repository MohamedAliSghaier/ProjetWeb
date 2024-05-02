<?php
class comment
{
    private ?int $idcom =null ;
    private ?string $cin = null;
    private ?string $commentaire = null;
   
     
    public function __construct($idcom, $cin, $commentaire)
    {
        $this->idcom = is_numeric($idcom) ? (int)$idcom : null;
        $this->cin = $cin;
        $this->commentaire = $commentaire;
    }
    


   

   
    public function getidcom()
    {
        return   $this->idcom;
    }
    public function setidcom($idcom)
    {
        $this->idcom = $idcom;
        return $this;
    }

    public function getcin()
    {
        return   $this->cin;
    }
    public function setcin($cin)
    {
        $this->cin = $cin;
        return $this;
    }

    public function getcommentaire()
    {
        return   $this->commentaire;
    }
    public function setcommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
        return $this;
    }
   
}

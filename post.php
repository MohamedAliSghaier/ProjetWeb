<?php
class post{
    private ?string $cin=null;
    private ?string $nom=null;
    private ?string $prenom=null;
    private ?string $email=null;
    private ?string $poste=null;
   
    

    public function __construct($cin, $nom, $prenom, $email, $poste)
    {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->poste = $poste;
        
    }
    public function getcin(){
        return   $this->cin;
    }
    public function setcin($cin){
        $this->cin=$cin;
        return $this;
    }

    public function getnom(){
        return   $this->nom;
    }
    public function setnom($nom){
        $this->nom=$nom;
        return $this;
    }

    public function getprenom(){
        return   $this->prenom;
    }
    public function setprenom($prenom){
        $this->prenom=$prenom;
        return $this;
    }

    public function getemail(){
        return   $this->email;
    }
    public function setemail($email){
        $this->email=$email;
        return $this;
    }

    public function getposte(){
        return   $this->poste;
    }
    public function setpost($poste){
        $this->poste=$poste;
        return $this;
    }

    

}
?>
<?php

 class User{

     private string $firstName;
     private string $lastName;
     private string $email;
     private string $username;
     private string $password;
     
 public function  __construct ($n,$p,$r,$u,$i)
    {
    $this->lastName=$n;
    $this->firstName=$p;
    $this->password=$r;
    $this->email=$u;
    $this->username=$i;
    }

    public function getFirstName()
    {
        return $this->lastName;
    }
    public function getLastName()
    {
        return $this->firstName;
    }   
    public function getPassword()
    {
        return $this->password;
    }
    public function geteMail()
    {
        return $this->email;
    }
    public function getUserName()
    {
        return $this->username;
    }

 }

?>
<?php
class user
{
    private ?int $id_user = null;
    private ?string $email = null;
    private ?string $mdp = null;
    private ?string $name = null;
    private ?string $surname = null;
    private ?string $dob = null;
    private ?int $role = null;

    public function __construct($email, $mdp, $name, $surname, $dob,$role)
    {
        $this->id_user = null;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->name = $name;
        $this->surname = $surname;
        $this->dob = $dob;
        $this->role=$role;
    }


    public function getIduser()
    {
        return $this->id_user;
    }


    public function getn()
    {
        return $this->name;
    }


    public function setn($n)
    {
        $this->name = $n;

        return $this;
    }


    public function getsurname()
    {
        return $this->surname;
    }


    public function setsurname($sn)
    {
        $this->surname = $sn;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getmdp()
    {
        return $this->mdp;
    }


    public function setmdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

   
    public function getdob()
    {
        return $this->dob;
    }


    public function setdob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    public function getrole()
    {
        return $this->role;
    }


    public function setrole($role)
    {
        $this->role = $role;

        return $this;
    }
}

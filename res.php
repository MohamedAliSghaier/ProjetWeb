<?php
class res
{
    private ?string $id_res = null;
    private ?string $id_client = null;
    private ?string $statut = null;


    public function __construct($id_res, $id_client, $statut)
    {
        $this->id_res = $id_res;
        $this->id_client = $id_client;
        $this->statut = $statut;

    }


    public function getIdres()
    {
        return $this->id_res;
    }


    public function getIdclient()
    {
        return $this->id_client;
    }


    public function setstatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }


    public function getstatut()
    {
        return $this->statut;
    }


}

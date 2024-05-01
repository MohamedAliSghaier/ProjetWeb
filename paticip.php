<?php
class Particip {
    private $id_p = null;
    private $statut = null;
    private $activite = null;

    public function __construct($id_p, $statut, $activite) {
        $this->id_p = $id_p;
        $this->statut = $statut;
        $this->activite = $activite;
    }

    public function getid() {
        return $this->id_p;
    }

    public function getstatut() {
        return $this->statut;
    }

    public function getactivite() {
        return $this->activite;
    }

    public function setid($id_p) {
        $this->id_p = $id_p;
    }

    public function setstatut($statut) {
        $this->statut = $statut;
    }

    public function setactivite($activite) {
        $this->activite = $activite;
    }
}
?>

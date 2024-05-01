<?php
class Activite {
    private $id_a = null;
    private $titre_a = null;
    private $description_a = null;
    private $categorie_a = null;
    private $prix_a = null;
    private $date_a = null;

    public function __construct($id_a, $titre_a, $description_a, $categorie_a, $prix_a, $date_a) {
        $this->id_a = $id_a;
        $this->titre_a = $titre_a;
        $this->description_a = $description_a;
        $this->categorie_a = $categorie_a;
        $this->prix_a = $prix_a;
        $this->date_a = $date_a;
    }

    public function getid() {
        return $this->id_a;
    }

    public function gettitre() {
        return $this->titre_a;
    }

    public function getdescription() {
        return $this->description_a;
    }

    public function getcategorie() {
        return $this->categorie_a;
    }

    public function getprix() {
        return $this->prix_a;
    }

    public function getdate() {
        return $this->date_a;
    }

    public function setid($id_a) {
        $this->id_a = $id_a;
    }

    public function settitre($titre_a) {
        $this->titre_a = $titre_a;
    }

    public function setdescription($description_a) {
        $this->description_a = $description_a;
    }
    public function setcategorie($categorie_a) {
        $this->categorie_a = $categorie_a;
    }

    public function setprix($prix_a) {
        $this->prix_a = $prix_a;
    }

    public function setdate($date_a) {
        $this->date_a = $date_a;
    }
}
?>

<?php
include 'C:/xampp/htdocs/dorra/Controller/participC.php';

$ParticipC = new ParticipC();
$listeParticip = $ParticipC->Afficherp();

if (isset($_GET['id_a'])) {
   
    $id_a = $_GET['id_a'];

    $ParticipC->Supprimerp($id_a);

    header('Location: afficherParticip.php?successMessage=Participation supprimée avec succès');
    exit; 
}
?>

<?php
    include 'C:\xampp\htdocs\dorra\Controller\activiteC.php';
	
    $message = "" ; 
	$Activitec=new Activitec();
	$Activitec->Supprimera($_GET["id_a"]);
    if (true) {
        $message = "l'activité est supprimeé";
    }
	header('Location:afficherActivite.php?message=Cours Supprimé avec succés');
?>
<?php
	include_once 'C:/xampp/htdocs/dorra/config/config.php';
	include_once 'C:/xampp/htdocs/dorra/model/paticip.php';
	class ParticipC {




/////..............................Afficher............................../////
function Afficherp(){
			$sql = "SELECT Particip.*, Activite.titre_a
			FROM Particip  LEFT JOIN Activite  ON Particip.activite = Activite.id_a";

    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch(Exception $e) {
        die('Erreur:'. $e->getMessage());
    }
}





		


/////..............................Supprimer............................../////
		function Supprimerp($id_p){
			$sql="DELETE FROM Particip WHERE id_p=:id_p";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_p', $id_p);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}







/////..............................Ajouter............................../////
		function Ajouterp($Particip,$id_a){
			$sql="INSERT INTO Particip (id_p,statut,activite) 
			VALUES (:id_p,:statut,:activite)";
			
			$db = config::getConnexion();
			try{
				
				$query = $db->prepare($sql);
				$query->execute([
					'id_p' => $Particip->getid(),
					'statut' => $Particip->getstatut(),
					'activite' =>$id_a
					
					 
			]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}







/////..............................Affichage par la cle Primaire............................../////
		function Recupererp($id_p){
			$sql="SELECT * from Particip where id_p=$id_p";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Particip=$query->fetch();
				return $Particip;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
function Modifierp($Particip, $id){
    try {
        $db = config::getConnexion();
        // Récupérer les détails de la participation actuelle
        $currentParticip = $this->Recupererp($id);
        
        // Comparer les valeurs postées avec les valeurs actuelles
        if ($Particip->getstatut() == $currentParticip['statut'] && $Particip->getactivite() == $currentParticip['activite']) {
            // Aucune modification n'est nécessaire
            echo "Aucune modification n'a été apportée.";
            return;
        }

        // Effectuer la mise à jour uniquement si les valeurs sont différentes
        $query = $db->prepare('UPDATE Particip SET statut=:statut, activite=:activite WHERE id_p=:id');
        $query->execute([
            'statut' => $Particip->getstatut(),
            'activite' => $Particip->getactivite(),
            'id' => $id
        ]);
        echo $query->rowCount()." records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


}
	?>
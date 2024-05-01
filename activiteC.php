<?php
	include_once 'C:/xampp/htdocs/dorra/config/config.php';
	include_once 'C:/xampp/htdocs/dorra/model/activite.php';
	class ActiviteC {




/////..............................Afficher............................../////
function Affichera(){
    $sql="SELECT * FROM Activite";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMessage());
    }
}





		


/////..............................Supprimer............................../////
		function Supprimera($id_a){
			$sql="DELETE FROM Activite WHERE id_a=:id_a";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_a', $id_a);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}







/////..............................Ajouter............................../////
function Ajoutera($Activite){
    $sql="INSERT INTO Activite (id_a,titre_a,description_a,categorie_a,prix_a,date_a) 
    VALUES (:id_a,:titre_a,:description_a,:categorie_a,:prix_a,:date_a)";
    
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
            'id_a' => $Activite->getid(),
            'titre_a' => $Activite->gettitre(),
            'description_a' => $Activite->getdescription(),
            'categorie_a' => $Activite->getcategorie(),
            'prix_a' => $Activite->getprix(),
            'date_a' => $Activite->getdate()	 
    ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }			
}






/////..............................Affichage par la cle Primaire............................../////
		function Recuperera($id_a){
			$sql="SELECT * from Activite where id_a=$id_a";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				$Activite=$query->fetch();
				return $Activite;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
function Modifiera($Activite, $id){
    try {
        $db = config::getConnexion();
        $query = $db->prepare('UPDATE Activite SET titre_a=:titre_a,description_a=:description_a,categorie_a=:categorie_a,prix_a=:prix_a,date_a=:date_a WHERE id_a=:id');
        $query->execute([
            'titre_a' => $Activite->gettitre(),
            'description_a' => $Activite->getdescription(),
            'categorie_a' => $Activite->getcategorie(),
            'prix_a' => $Activite->getprix(),
            'date_a' => $Activite->getdate(),
            'id' => $id
        ]);
        echo $query->rowCount()." records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

function getIdByType($titre_a) {
    $sql = "SELECT id_a FROM Activite WHERE titre_a= :titre_a";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['titre_a' => $titre_a]);
        $result = $query->fetch();
        return $result['id_a']; 
    } catch (PDOException $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
    }
	?>
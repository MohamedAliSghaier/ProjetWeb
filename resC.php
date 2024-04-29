<?php
require '../config.php';

class resC {

    public function listres(){
        $sql='SELECT * FROM reservations';
        $db = config::getConnexion();
        try{
        $list = $db->query($sql);
        return $list;
        }catch(Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    public function afficherres()
{
    $pdo =config::getConnexion();
    {
        try
        {
            $query = $pdo ->prepare (
                'select * FROM reservations'
            );
            $query ->execute();
            $result = $query ->fetchAll();  // fetchAll :  recuperer le resultat d'execution 
            /*CODE PLUS REDUITS  remplace les 3 lignes ci dessus
        *********    $result = $pdo -> query ("SLECT *FROM res"); ************/
            return $result;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
}
public function supprimerres ($num)
{
    $sql ="DELETE FROM reservations WHERE id_res = :num"; //num place holder
    $pdo =config::getConnexion ();

    $query =$pdo ->prepare($sql);
    $query ->bindValue (':num',$num);

    try{
        $query ->execute();
        //ou bien execute(['num]=>$num); fi blaset bindValue

    }catch (PDOException $e)
    {
        $e ->getMessage();
    }
}

public function detailsres($num)
{
  $sql = "SELECT * FROM reservations WHERE id_res = ?";
  $pdo = config::getConnexion();

  try {
    $query = $pdo->prepare($sql);
    $query->execute([$num]); // Use prepared statement with parameter

    $res = $query->fetch();
    if ($res) {
      return $res;
    } else {
      // Handle no reservation found (log error, display message)
      return null;  // Or throw an exception if preferred
    }
  } catch (PDOException $e) {
    return null;  // Or throw an exception if preferred
  }
}
/*public function detailsres($num)
{
$sql ="SELECT *FROM reservations WHERE id_res =$num";
$pdo = config :: getConnexion();

    try{
    $query =$pdo->prepare($sql);
    $query ->execute();

    $res =$query->fetch();
    return $res;

    }catch (PDOException $e)
    {
    $e ->getMessage();
    }   
}*/

public function ajouterres ($res)
    {
        $pdo =config::getConnexion ();
        try{
            $query =$pdo->prepare(
        
                "INSERT INTO reservations (id_res,id_client,statut)
                VALUES (:id_res,:id_client,:statut)"
        
            );    //query = requette
        
            $query ->execute([
                //'NumAbon'=>$res->getNumAbonnement(),  auto 
                'id_res'=>$res->getid_res(),
                'id_client'=>$res->getid_client(),
                'statut'=>$res->getstatut(),

            ]);
        
        } catch (PDOException $e)
        {
         $e ->getMessage();
        }
         }




}
?>

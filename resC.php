<?php

require_once '../config.php';

class resC
{

    public static function listres()
    {
        $sql = "SELECT * FROM reservations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function showAllReservations() {
        $reservations = $this->listres(); // Call listres to get reservations
        require '../views/reservations/index.php'; // Pass $reservations to view
      }
    public static function deleteres($idr)
    {
        $sql = "DELETE FROM reservations WHERE id_res = :id_res";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_res', $idr);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addres($res)
    {
        $sql = "INSERT INTO reservations(id_res, id_client, statut)
        VALUES (:id_res, :id_client, :statut)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_res' =>$res->getIdres(),
                'id_client' => $res->getIdclient(),
                'statut' => $res->getstatut(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showres($idr)
    {
        $sql = "SELECT * from reservations where id_res = $idr";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $res = $query->fetch();
            return $res;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateres($res, $idr)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservations SET 
                    id_res= :id_res,
                    id_client= :id_client, 
                    statut= :statut, 
                WHERE id_res= :id_res'
            );
            
            $query->execute([
                'id_res' => $idr,
                'id_client' => $res->getIdclient(),
                'statut' => $res->getstatut(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
            echo $e;
        }
    }

    /*function getbyemail($email) {
        $sql = "SELECT * from user where email = :email";
        $db = config::getConnexion();
        try {
          $query = $db->prepare($sql);
          $query->execute([
            ':email' => $email,
          ]);
    
          $admin = $query->fetch();
          return $admin;
        } catch (Exception $e) {
          die('Error: '. $e->getMessage());
        }
      }*/

      public static function getbyid($idr) {
        $sql = "SELECT * from reservations where id_res = :id_res";
        $db = config::getConnexion();
        try {
          $query = $db->prepare($sql);
          $query->execute([
            ':id_res' => $idr,
          ]);
    
          $admin = $query->fetch();
          return $admin;
        } catch (Exception $e) {
          die('Error: '. $e->getMessage());
        }
      }
}

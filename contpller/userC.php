<?php

require __DIR__ . '/../config.php';

class userC
{

    public function listusers()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteuser($ide)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function adduser($user)
    {
        $sql = "INSERT INTO user(id, lastname, firstname, email, dob, mdp, role)
        VALUES (:id, :sn, :n, :email, STR_TO_DATE(:dob, '%d/%m/%Y'), :pwd, :role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' =>$user->getIduser(),
                'sn' => $user->getsurname(),
                'n' => $user->getn(),
                'email' => $user->getEmail(),
                'dob' =>$user->getdob(),
                'pwd' => $user->getmdp(),
                'role' => $user->getrole()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showuser($id)
    {
        $sql = "SELECT * from user where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateuser($user, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    lastname= :sn,
                    firstname= :n, 
                    email= :email, 
                    dob= STR_TO_DATE(:dob, "%d/%m/%Y"),
                    mdp= :pwd,  
                    role=:role
                WHERE id= :iduser'
            );
            
            $query->execute([
                'iduser' => $id,
                'sn' => $user->getsurname(),
                'n' => $user->getn(),
                'email' => $user->getEmail(),
                'dob' => $user->getdob(),
                'pwd' => $user->getmdp(),
                'role' =>$user->getrole(),
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
            echo $e;
        }
    }

    function getbyemail($email) {
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
      }

      function getbyid($id) {
        $sql = "SELECT * from user where id = :id";
        $db = config::getConnexion();
        try {
          $query = $db->prepare($sql);
          $query->execute([
            ':id' => $id,
          ]);
    
          $admin = $query->fetch();
          return $admin;
        } catch (Exception $e) {
          die('Error: '. $e->getMessage());
        }
      }
}

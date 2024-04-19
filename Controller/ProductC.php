<?php
include '../config.php';
 class ProductC{
    public function listProducts(){
        $sql="SELECT * FROM employe";
        $db = config::getConnexion();
        try{
        $list = $db->query($sql);
        return $list;
        }catch(Exception $e){
            die('Error:' . $e->getMessage());
        }
    }

    public function addEmployee($Id,$lastName,$firstName,$email,$Dob){

        $sql = "INSERT INTO employe(Id,lastName,firstName,email,Dob) Values (:Id,:lastName,:firstName,:email,:Dob)";
        $db = config::getConnexion();
        try
        {
          $query=$db->prepare($sql);
          $query->bindValue(':Id',$Id);
          $query->bindValue(':lastName',$lastName);
          $query->bindValue(':firstName',$firstName);
          $query->bindValue(':email',$email);
          $query->bindValue(':Dob',$Dob);
          $query->execute();


        } catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }

    public function deleteEmployee($Id)
    {
        $sql="DELETE FROM employe WHERE Id=:Id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->bindValue(':Id',$Id);
            $query->execute();
            $rowCount=$query->rowCount();
            if ($rowCount>0)
            {
                echo "Delete Succesful. $rowCount rows affected";
            }else{
                echo "No rows deleted.";
            }

        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }


    }

    public function updateEmployee($Id,$lastName,$firstName,$email,$Dob){

        $sql="UPDATE employe SET lastName=:lastName, firstName=:firstName,email=:email,Dob=:Dob WHERE Id=:Id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->bindValue(':Id',$Id);
            $query->bindValue(':lastName',$lastName);
            $query->bindValue(':firstName',$firstName);
            $query->bindValue(':email',$email);
            $query->bindValue(':Dob',$Dob);
            $query->execute();
            echo $query->rowCount() . "Record Updated succesfully";


        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }


    }
    

    }
 
?>
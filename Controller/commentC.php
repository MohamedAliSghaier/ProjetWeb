<?php
include "../config.php";

 class commentC{
    public function listcomments(){
        $sql="SELECT * FROM comment";
        $db = config::getConnexion();
        try{
        $list = $db->query($sql);
        return $list;
        }catch(Exception $e){
            die('Error:' . $e->getMessage());
        }
    }

    public function getcomment($Id){
        $sql="SELECT * FROM comment WHERE Id=$Id ";
        $db = config::getConnexion();
        try{
        $list = $db->query($sql);
        return $list;
        }catch(Exception $e){
            die('Error:' . $e->getMessage());
        }
    }

    public function addcomment(comment $C){
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comment(contenu,datee) Values (:contenu,:datee)";
        $db = config::getConnexion();
        try
        {
          $query=$db->prepare($sql);
         // $query->bindValue(':IdP',$C->getIdP());
          $query->bindValue(':contenu',$C->getcontenu());
          $query->bindValue(':datee',$date);
          /*$query->bindValue(':ProductImage',$P->getImage());*/
          $query->execute();


        } catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }

    }

    public function deletecomment($Id)
    {
        $sql="DELETE FROM comment WHERE Id=:Id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->bindValue(':Id',$Id);
            $query->execute();
            $rowCount=$query->rowCount();
            if ($rowCount>0)
            {
                echo "Delete Succesful";
                header('location:forum.php');
            }else{
                echo "No rows deleted.";
            }

        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }


    }

    public function updatecomment($Id,$contenu){

        $sql="UPDATE comment SET contenu=:contenu WHERE Id=:Id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->bindValue(':Id',$Id);
            $query->bindValue(':contenu',$contenu);
           /* $query->bindValue(':ProductImage',$ProductImage);*/
            $query->execute();
            echo $query->rowCount() . "Record Updated succesfully";
            header('location:forum.php');



        }
        catch(Exception $e)
        {
            die('Error:' . $e->getMessage());
        }


    }
    

    }
 
?>
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

    public function addComment($contenu, $id_post){
        $sql = "INSERT INTO comment(contenuC, datee, idP) VALUES (?, NOW(), ?)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([$contenu, $id_post]);
            return true; // Retourne true si l'insertion a réussi
        } catch(Exception $e) {
            die('Error:' . $e->getMessage());
            return false; // Retourne false en cas d'erreur
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

        $sql="UPDATE comment SET contenuC=:contenu WHERE Id=:Id";
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
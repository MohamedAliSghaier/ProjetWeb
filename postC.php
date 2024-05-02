<?php

require_once('config.php');

class postC
{
    function addpost($post)
    {
        $sql = "INSERT INTO post (cin, nom, prenom, email, poste) 
        VALUES (:cin, :nom, :prenom, :email, :poste)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'cin' => $post->getcin(),
                'nom' => $post->getnom(),
                'prenom' => $post->getprenom(),
                'email' => $post->getemail(),
                'poste' => $post->getposte(),
                
               

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listepost()
    {
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletepost($cin)
    {
        $sql = "DELETE FROM post WHERE cin = :cin";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':cin', $cin);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showpost($cin)
    {
        $sql = "SELECT * FROM post WHERE cin = :cin";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':cin', $cin);
            $query->execute();
            $cin = $query->fetch();
            return $cin;
        } catch (Exception $e) {
            // Log or handle the exception
            throw new Exception('Error showing post: ' . $e->getMessage());
        }
    }
    function updatepost($post, $cin)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE post SET
            nom = :nom,
            prenom = :prenom,
            email=:email,
            poste=:poste
            
            WHERE cin=:cin'
            );
            $query->execute([
                'cin' => $cin,
                'nom' => $post->getnom(),
                'prenom' => $post->getprenom(),
                'email' => $post->getemail(),
                'poste' => $post->getposte(),
                

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); 
        }
    }
    
    
}

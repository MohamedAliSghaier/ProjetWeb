<?php

require_once('config.php');

class commentC
{
    function addComment($comment)
{
    $sql = "INSERT INTO comment (cin, commentaire) 
            VALUES (:cin, :commentaire)";
    $db = Config::getConnexion(); // Assuming Config is your database configuration class
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'cin' => $comment->getCin(),
            'commentaire' => $comment->getCommentaire()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    public function listecomment()
    {
        $sql = "SELECT * FROM comment";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listeRatingASC()
    {
        $sql = "SELECT * FROM trajettaxi ORDER BY rating ASC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function listeRatingDESC()
    {
        $sql = "SELECT * FROM trajettaxi ORDER BY rating DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecomment($idcom)
    {
        $sql = "DELETE FROM comment WHERE idcom = :idcom";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idcom', $idcom);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function showcomment($idcom)
    {
        $sql = "SELECT * FROM comment WHERE idcom = :idcom";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idcom', $idcom);
            $query->execute();
            $idcom = $query->fetch();
            return $idcom;
        } catch (Exception $e) {
            // Log or handle the exception
            throw new Exception('Error showing comment: ' . $e->getMessage());
        }
    }

    function updatecomment($comment, $idcom)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE comment SET
              cin = :cin,commentaire=:commentaire
            WHERE idcom = :idcom'
            );
            $query->execute([
                'idcom' => $idcom,
                'cin' => $comment->getcin(),
                'commentaire' => $comment->getcommentaire()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Handle the exception appropriately for your application
        }
    }
}

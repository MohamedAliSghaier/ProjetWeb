<?php
if (!class_exists('config')) {
    include "../config.php";
}

class postC {
    public function listPosts(){
        $sql = "SELECT * FROM post";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch(Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getPost($id){
        $sql = "SELECT * FROM post WHERE idP=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC); // Utilisez fetch() pour récupérer une seule ligne
        } catch(Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    public function addPost($contenu, $id_user){
        $sql = "INSERT INTO post(contenuP, date, id_user) VALUES (?, NOW(), ?)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([$contenu, $id_user]);
            return true; // Retourne true si l'insertion a réussi
        } catch(Exception $e) {
            die('Error:' . $e->getMessage());
            return false; // Retourne false en cas d'erreur
        }
    }
    
    

    public function deletePost($id){
        $db = config::getConnexion();
        try {
            // Supprimer tous les commentaires liés à ce post
            $sql_delete_comments = "DELETE FROM comment WHERE idP=:id";
            $query_delete_comments = $db->prepare($sql_delete_comments);
            $query_delete_comments->bindValue(':id', $id);
            $query_delete_comments->execute();
    
            // Supprimer le post
            $sql_delete_post = "DELETE FROM post WHERE idP=:id";
            $query_delete_post = $db->prepare($sql_delete_post);
            $query_delete_post->bindValue(':id', $id);
            $query_delete_post->execute();
    
            $rowCount = $query_delete_post->rowCount();
            if ($rowCount > 0) {
                echo "Delete Successful";
                header('location:forumP.php');
            } else {
                echo "No rows deleted.";
            }
        } catch(Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    

    public function updatePost($id, $contenuP, $date, $id_user){
        $sql = "UPDATE post SET contenuP=:contenuP, date=:date, id_user=:id_user WHERE idP=:id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->bindValue(':contenuP', $contenuP);
            $query->bindValue(':date', $date);
            $query->bindValue(':id_user', $id_user);
            $query->execute();
            echo $query->rowCount() . " Record Updated successfully";
            header('location:forumP.php');
        } catch(Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getPostsId(){
        $sql = "SELECT idP FROM post"; // Sélectionnez uniquement les ID des posts
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $posts = $query->fetchAll(PDO::FETCH_COLUMN); // Récupérer tous les ID des posts
            return $posts;
        } catch(Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    
}
?>

<?php
include_once '../config.php';
include_once '../model/comment.php';


$pdo = config::getConnexion();


$commentModel = new Comment($pdo);

// Start the session
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['forum'])) {
       

        // Check if the user is logged in
        if(isset($_SESSION['user_id'])){
            $userId = $_SESSION['user_id'];
            $commentText = $_POST['message']; 

            
            if ($commentModel->addComment($userId, $commentText)) {
                
                header('Location: about.php?success=Comment added successfully');
                exit;
            } else {
                
                header('Location: about.php?error=Failed to add comment');
                exit;
            }
        } else {
            
            header('Location: ../view/login.php?error=You must be logged in to comment');
            exit;
        }
    }
}
?>

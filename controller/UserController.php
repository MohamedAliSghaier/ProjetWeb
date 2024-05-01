<?php
include_once '../config.php';
include_once '../model/user.php';


$pdo = config::getConnexion();


$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Login request
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $loggedInUser = $userModel->login($email, $password);
            var_dump($loggedInUser); 
            if ($loggedInUser) {
                session_start();
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['username'] = $loggedInUser['username'];
                $_SESSION['user_photo'] = $loggedInUser['photo'];
                $_SESSION['user_email'] = $loggedInUser['email'];

                header('Location: ../view/home.php'); 
                exit;
            } else {
                
                header('Location: ../view/login.php?error=Invalid email or password');
                exit;
            }
        } else {
           
            header('Location: ../view/login.php?error=Email and password are required');
            exit;
        }
    } elseif (isset($_POST['register'])) {
        // Registration request
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && isset($_FILES['photo'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $photo = $_FILES['photo']['name'];
            $target_dir = "../uploads/"; // Update the target directory path
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $extensions_arr = array("jpg", "png");

            if (in_array($imageFileType, $extensions_arr)) {
                $userModel->register($name, $email, $password, $photo);
                move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

          
                
                
                exit;
            } else {
               
                header('Location: ../view/login.php?error=Invalid file type. Allowed types: jpg, png');
                exit;
            }
        } else {
            
            header('Location: ../view/login.php?error=All fields are required for registration');
            exit;
        }
    } else {
        
        header('Location: ../view/login.php?error=Invalid request');
        exit;
    }
}
?>

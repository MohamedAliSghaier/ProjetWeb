<?php
    include '../controller/userC.php';
    $id=$_GET["id"];
    $userC = new userC();

    $userC->deleteuser($id);

    header('Location: ./usersList.php');
    exit();
  
<?php


include '../Controller/postC.php';
$postC = new postC();

if(isset($_GET['deleteid']))
{
    $Id=$_GET['deleteid'];
    $postC->deletePost($Id);

}
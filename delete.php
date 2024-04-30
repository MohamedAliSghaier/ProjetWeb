<?php


include '../Controller/commentC.php';
$commentC = new commentC();

if(isset($_GET['deleteid']))
{
    $Id=$_GET['deleteid'];
    $commentC->deletecomment($Id);

}
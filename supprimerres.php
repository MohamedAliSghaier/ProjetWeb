<?php

include '../controller/resC.php';
include '../model/res.php';

$res=new resC();

/*$res ->supprimerres($_GET["id_res"]);

header('Location:afficherListeres.php');

?>*/

if(isset($_GET['id_res']))
{
    $res=$_GET['id_res'];
    $commentC->suprimerres($res);

}
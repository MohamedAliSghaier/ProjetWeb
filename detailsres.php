<?php

include '../controller/resC.php';
include '../model/res.php';

$resC=new resC();

$res =$resC->detailsres($_POST['id_res']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>res</title>
</head>


<body>
<?php  if ($res != null) {
    echo "<h1>Details res</h1>";
    echo "<ul>";
    echo "<li>" . $res['id_res'] . "</li>";
    echo "<li>" . $res['id_client'] . "</li>";
    echo "<li>" . $res['statut'] . "</li>";
    echo "</ul>";
} else {
    echo "Error: Could not retrieve reservation details.";
}?>
</body>
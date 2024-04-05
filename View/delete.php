<?php

include('../connexion/config.php');
if(isset($_GET['deleteid']))
{
    $Id=$_GET['deleteid'];
    $sql="DELETE FROM images WHERE Id=$Id";
    $result=mysqli_query($con,$sql);
    if ($result)
    {
        header('location:display.php');
    }
    else
    {
        echo('no success');
    }
}

?>
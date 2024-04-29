<?php 
include '../controller/resC.php';
include '../model/res.php';

$resC=new resC();

if(isset($_POST['id_res']))
{
    $res=new res ($_POST['id_res']);
  $resC->ajouterres($res);
}
  $resC->listres();
/*$s=0;
if(isset($_POST['id_res'])&&
isset($_POST['id_client'])&&
isset($_POST['statut'])&&)
    


{
    $res=new res(
    //$_POST['NumAbon'],
    $_POST['id_res'],
    $_POST['id_client'],
    $_POST['statut'],

    );
    $s=1;
}*/
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
 <!-- 
<form action="" method="POST">
 <div>
 <pre>
  <label for="NumAbon">Numero Abonnement <input type="int"  id="NumAbon" name="NumAbon"> 
    <label for="Nom">Lastname <input type="text"  id="Nom" name="Nom">
    <label for="Prenom">firstname <input type="text" id="Prenom"  name="Prenom">
    <label for="Adresse">Adresse  <input type="text" id="Adresse" name="Adresse">
    <label for="Email">Email  <input type="text" id="Email" name="Email">
    <label for="DateInscription">Date Inscription  <input type="date" id="DateInscription" name="DateInscription" >
    <input type="submit"   value="Add">
    <input type="reset" value="Reset">
 </div>   
 </pre>  
</form>  -->

    <table border=1>
    <tr>
        <th>ID Reservation</th>
        <th>ID Client</th>
        <th>Statut</th>

        <th>Modifier</th>
        <th>Supprimer</th>
        <th>Détails</th>
    </tr>

<?php
    foreach($list as $res) {   
?>  
  
 <tr>
     <td><?php echo $res ['id_res'];?></td>
     <td><?php echo $res ['id_client'];?></td>
     <td><?php echo $res ['statut'];?></td>
     <td>Modifier</td>
        <td>
            <a href="supprimerres.php?id_res=<?php echo $res['id_res'];?>">Supprimer</a>
        </td>

        <td>
            <form method="POST" action="detailsres.php">

            <input type="submit" value ="Voir Details">
            <input type="hidden" name="id_res" value="<?php echo $res ['id_res'];?>">
            </form>

        </td>
 </tr>
<?php
 }
?>
    </table>
</body>

</html>


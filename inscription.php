<?php 
include '../controller/userC.php';
include '../model/user.php';

$userC=new userC();
$s=0;
if(
    isset($_POST['nom'])&&
    isset($_POST['prenom'])&&
    isset($_POST['email'])&&
    isset($_POST['username'])&&
    isset($_POST['Password'])
    )
{
    $user=new user(
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['username'],
    $_POST['Password']
    );
    $s=1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<form action="" method="POST">
 <div>
 <pre>
    <label for="nom">Lastname <input type="text"  id="n" name="nom">
    <label for="prenom">firstname <input type="text" id="prenom"  name="prenom">
    <label for="email">Email  <input type="text" id="email" name="email">
    <label for="username">username  <input type="text" id="username" name="username">
    <label for="Password">Password  <input type="password" id="Password" name="Password" >
    <input type="submit"   value="Add">
    <input type="reset" value="Reset">
 </div>   
 </pre>  
</form>

<?php if($s==1)
//variable pour verifier si le formulaire est rempli
{
$userC->addUser($user);
$userC->afficher($user);
}
?>  
</body>
</html>
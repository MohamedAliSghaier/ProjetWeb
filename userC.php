<?php
require '../config.php';
class UserC {

public function addUser ($user){

    $pdo =config::getConnexion();

try{
    $query =$pdo->prepare(

        "INSERT INTO user (id,firstName,lastName,email,username,password)
        VALUES (:id, :firstName, :lastName, :email, :username, :password)"

    );    //query = requette

    $query ->execute([

        //on a enlevé 'id' car il est généré automatiquement 
        'firstName'=>$user->getFirstName(),
        'lastName'=>$user->getLastName(),
        'email'=>$user->geteMail(),
        'username'=>$user->getUserName(),
        'password'=>$user->getPassword(),
    ]);

} catch (PDOException $e)
{
 $e ->getMessage();
}
}

public function afficher($user)

    {
        echo('
        <table border=1>
        <tr>
            <th>lastName</th>
            <th>firstName</th>
            <th>password</th>
            <th>email</th>
            <th>username</th>
        </tr>
        <tr>
            <th>'. $user->getFirstName().'</th>
            <th>'. $user->getLastName().'</th>
            <th>'. $user->geteMail().'</th>
            <th>'. $user->getUserName().'</th>
           <th>'. $user->getPassword().'</th>
        </tr>
      </table>

      ');
    }
}
?>

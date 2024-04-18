<?php

require 'config.php';

$pdo =config::getConnexion();

try{
    $query =$pdo->prepare(

        "INSERT INTO user (id_res,id_client,statut)
        VALUES (:id_res, :id_client, :statut)"

    );    //query = requette

    $query ->execute([
        'id_res'=>'abcd',
        'id_client'=>'Flen',
        'statut'=>'Active',

    ]);

} catch (PDOException $e)
{
 $e ->getMessage();
}
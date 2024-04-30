<?php

include '../Controller/postC.php';

$PostC = new postC();

// Récupération de l'ID du post à mettre à jour depuis l'URL
if(isset($_GET['updateid'])) {
    $Id = $_GET['updateid'];
    // Récupération des détails du post à partir de l'ID
    $Post = $PostC->getPost($Id); // Utilisez $Post au lieu de $postlist
}

// Vérification si le formulaire a été soumis
if(isset($_POST['submit'])) {
    // Récupération des valeurs du formulaire
    $Id = $_GET['updateid'];
    $contenuP = $_POST['contenuP'];
    $date = $_POST['date'];
    $id_user = $_POST['id_user'];

    // Appel de la méthode updatePost du contrôleur pour mettre à jour le post
    $PostC->updatePost($Id, $contenuP, $date, $id_user);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <title>Update Post</title>
</head>
<body>

<?php 
// Vérifiez si $Post est défini avant d'afficher le formulaire
if(isset($Post)) {
?>

<form method="POST" enctype="multipart/form-data">
  <h2>Update Post</h2>
  <div class="mb3">
    <label>Contenu</label>
    <input type="text" class="form-control" id="contenuP" name="contenuP" value="<?php echo $Post['contenuP']; ?>">
  </div>
  <div class="mb3">
    <label>Date</label>
    <input type="date" class="form-control" id="date" name="date" value="<?php echo $Post['date']; ?>">
  </div>
  <div class="mb3">
    <label>User ID</label>
    <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $Post['id_user']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php 
}
?>

</body>
</html>

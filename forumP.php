<?php

include '../Controller/PostC.php'; // Assurez-vous que le chemin vers le contrôleur est correct
include '../Model/post.php';

$PostC = new PostC();

if(isset($_POST['submit'])) {
  // Vérifier si le champ "contenuP" et "id_user" ne sont pas vides
  if (!empty($_POST['contenuP']) && !empty($_POST['id_user'])) {
      // Récupération du contenu et de l'id_user du formulaire
      $contenuP = $_POST['contenuP'];
      $id_user = $_POST['id_user'];

      // Appel de la méthode addPost avec le contenu et l'id_user
      $success = $PostC->addPost($contenuP, $id_user); 

      if ($success) {
          // Redirection après l'ajout d'un post
          header('Location: ' . $_SERVER['PHP_SELF']);
          exit; // Assurez-vous de terminer le script après la redirection
      } else {
          echo "Une erreur s'est produite lors de l'ajout du post.";
      }
  } else {
      echo "Tous les champs sont obligatoires.";
  }
}


// Récupération de la liste des posts
$list = $PostC->listPosts();

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 

    <title>Document</title>
</head>
<body>

<form method="POST" enctype="multipart/form-data">
  <h2>Add Post</h2>
  <div class="mb3">
    <label>Contenu</label>
    <input type="text" class="form-control" id="contenuP" name="contenuP" placeholder="Enter A Post">
  </div>
  <div class="mb3">
    <label>User ID</label>
    <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Enter User ID">
  </div> 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>




<table class="table ProductsTable">
  <thead>
    <tr>
      <th scope="col">Id Post</th>
      <th scope="col">id_user</th>
      <th scope="col">Contenu</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach ($list as $Post) {
    ?>
      <tr>
        <td><?php echo $Post['idP']; ?></td>
        <td><?php echo $Post['id_user']; ?></td>
        <td><?php echo $Post['contenuP']; ?></td>
        <td><?php echo $Post['date']; ?></td>
        <td>
          <button class="btn btn-primary"><a href="updateP.php?updateid=<?php echo $Post['idP']; ?>" class="text-light">Update</a></button>
          <button class="btn btn-danger"><a href="deleteP.php?deleteid=<?php echo $Post['idP']; ?>" class="text-light">Delete</a></button>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</body>
</html>

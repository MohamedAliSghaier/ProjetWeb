<?php
include '../Controller/commentC.php';
include '../Controller/postC.php';
include '../Model/comment.php';
include '../Model/post.php';

$CommentC = new commentC();
$postC = new postC();

// Récupérer les idP de la table Post
$postIds = $postC->getPostsId();

/*if(isset($_POST['submit'])) {
  $contenu = $_POST['commentaire']; // Récupérez l'ID de l'utilisateur depuis le formulaire
  $idP = $_POST['idP'];
  
  // Ajouter le commentaire
  $CommentC->addComment($contenu,$idP);
  
  // Redirection vers la page ou le message de confirmation
  header("Location: forum.php");
  exit();
}*/

if(isset($_POST['submit'])) {
    $contenu = $_POST['commentaire']; // Récupérez le contenu du commentaire depuis le formulaire
    $idP = $_POST['idP'];
    
    // Vérifier si le contenu est vide
    if(empty($contenu)) {
      // Afficher un message et arrêter l'exécution
      echo "Le contenu ne doit pas être vide";
      exit(); // Arrête l'exécution du script
    }
    
    // Ajouter le commentaire
    $CommentC->addComment($contenu, $idP);
    
    // Redirection vers la page ou le message de confirmation
    header("Location: forum.php");
    exit();
  }
  

$list=$CommentC->listcomments();
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
    
</body>
</html>

<body>
    <form method="POST" enctype="multipart/form-data">
        <h2>Ajouter un commentaire</h2>
        <div class="mb3">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="commentaire" name="commentaire" placeholder="Enter A Comment">
        </div>
        <!-- Assurez-vous d'avoir un champ pour l'ID de l'utilisateur -->
        <div class="mb3">
            <label>ID du Post</label>
            <select class="form-select" name="idP">
                <?php 
                // Parcourir les idP et les ajouter comme options dans la liste déroulante
                foreach ($postIds as $postId) {
                    echo "<option value='".$postId."'>".$postId."</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</body>

<table class="table ProductsTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">IdPost</th>
      <th scope="col">Contenu</th>
      <th scope="col">Date</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php 
            foreach ($list as $Comment){
                ?>
                <tr>
                    <td><?php echo $Comment['id']; ?></td>
                    <td><?php echo $Comment['idP']; ?></td>
                    <td><?php echo $Comment['contenuC']; ?></td> <!-- Assurez-vous que le nom de la colonne est correct -->
                    <td><?php echo $Comment['datee']; ?></td>
                    <td>
                        <button class="btn btn-primary"><a  href="update.php?updateid=<?php echo $Comment['id']; ?>"class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo $Comment['id']; ?>" class="text-light">Delete</a></button>
                    </td>
                </tr>
                <?php
            }
            ?>
  </tbody>
</table>
</body>
</html>

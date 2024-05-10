<?php
include '../Controller/commentC.php';
include '../Controller/postC.php';
include '../Model/comment.php';
include '../Model/post.php';

$CommentC = new commentC();
$postC = new postC();

// Récupérer les idP de la table Post
$postIds = $postC->getPostsId();

// Traitement du tri des commentaires
$sortColumn = $_GET['column'] ?? 'default';
$sortDirection = $_GET['direction'] ?? 'default';

if ($sortColumn === 'montant') {
    if ($sortDirection === 'ASC') {
        $list = $CommentC->listeRatingASC(); // Tri ascendant
    } elseif ($sortDirection === 'DESC') {
        $list = $CommentC->listeRatingDESC(); // Tri descendant
    } else {
        $list = $CommentC->listcomments(); // Tri par défaut
    }
} else {
    $list = $CommentC->listcomments(); // Tri par défaut
}

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
<div class="dropdown" style="margin-left: 25px;">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort By
    </button>
    <div class="dropdown-menu" aria-labelledby="sortDropdown">
        <a class="dropdown-item" href="./forum.php?column=montant&direction=ASC">Asc</a>
        <a class="dropdown-item" href="./forum.php?column=montant&direction=DESC">Desc</a>
    </div>
</div>

<table class="table ProductsTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">IdPost</th>
      <th scope="col">Contenu</th>
      <th scope="col">Date</th>
      <th scope="col">Likes </th>
      <th scope="col">Dislikes </th>
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
    <td><?php echo $Comment['NbLikeComment']; ?></td>
    <td><?php echo $Comment['NbDislikeComment']; ?></td>
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
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="back_office/assets/js/core/popper.min.js"></script>
<script src="back_office/assets/js/core/bootstrap.min.js"></script>

<!-- Other scripts -->
<script src="back_office/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="back_office/assets/js/plugins/smooth-scrollbar.min.js"></script>
<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownButton = document.getElementById("sortDropdown");
        var dropdownMenu = document.querySelector("#sortDropdown + .dropdown-menu");

        dropdownButton.addEventListener("click", function() {
            if (dropdownMenu.style.display === "none" || dropdownMenu.style.display === "") {
                dropdownMenu.style.display = "block";
            } else {
                dropdownMenu.style.display = "none";
            }
        });

        document.addEventListener("click", function(event) {
            if (!event.target.matches("#sortDropdown")) {
                dropdownMenu.style.display = "none";
            }
        });
    });
</script>
</html>

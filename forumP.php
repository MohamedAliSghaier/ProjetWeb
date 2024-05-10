<?php
include '../Controller/PostC.php';
include '../Model/post.php';
/*include("header.php");*/

$PostC = new PostC();

// Handle form submission for adding a new post
if(isset($_POST['submit'])) {
    if (!empty($_POST['contenuP']) && !empty($_POST['id_user'])) {
        $contenuP = $_POST['contenuP'];
        $id_user = $_POST['id_user'];

        $success = $PostC->addPost($contenuP, $id_user); 

        if ($success) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Une erreur s'est produite lors de l'ajout du post.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}

// Default sorting
$sortColumn = isset($_GET['column']) ? $_GET['column'] : 'default';
$sortDirection = isset($_GET['direction']) ? $_GET['direction'] : 'default';

if ($sortColumn === 'montant') {
    if ($sortDirection === 'ASC') {
        $list = $PostC->listeRatingASC();
    } elseif ($sortDirection === 'DESC') {
        $list = $PostC->listeRatingDESC();
    } else {
        $list = $PostC->listPosts(); // Default sorting
    }
} else {
    $list = $PostC->listPosts(); // Default sorting
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
<div class="dropdown" style="margin-left: 25px;">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort By
    </button>
    <div class="dropdown-menu" aria-labelledby="sortDropdown">
        <a class="dropdown-item" href="./forumP.php?column=montant&direction=ASC">Montant (Asc)</a>
        <a class="dropdown-item" href="./forumP.php?column=montant&direction=DESC">Montant (Desc)</a>
    </div>
</div>

<table class="table ProductsTable">
  <thead>
    <tr>
      <th scope="col">Id Post</th>
      <th scope="col">id_user</th>
      <th scope="col">Contenu</th>
      <th scope="col">Date</th>
      <th scope="col">Likes </th>
      <th scope="col">Dislikes</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($list as $Post) { ?>
      <tr>
        <td><?php echo $Post['idP']; ?></td>
        <td><?php echo $Post['id_user']; ?></td>
        <td><?php echo $Post['contenuP']; ?></td>
        <td><?php echo $Post['date']; ?></td>
        <td><?php echo $Post['NbLikePost']; ?></td>
        <td><?php echo $Post['NbDislikePost']; ?></td>
        <td>
          <button class="btn btn-primary"><a href="updateP.php?updateid=<?php echo $Post['idP']; ?>" class="text-light">Update</a></button>
          <button class="btn btn-danger"><a href="deleteP.php?deleteid=<?php echo $Post['idP']; ?>" class="text-light">Delete</a></button>
        </td>
      </tr>
    <?php } ?>
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

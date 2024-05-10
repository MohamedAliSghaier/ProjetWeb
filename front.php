<?php

include '../Controller/commentC.php';
include '../Controller/postC.php';
include '../Model/comment.php';
include '../Model/post.php';
include("header.php");

//session_start();






$CommentC = new commentC();
$PostC = new PostC();

if(isset($_POST['submit'])) {
  // Vérifier si le champ "contenuP" n'est pas vide
  if (!empty($_POST['contenuP'])) {
      // Récupération du contenu du formulaire
      $contenuP = $_POST['contenuP'];
      
      // Affecter 1 à $id_user
      $id_user = 1;

      // Appel de la méthode addPost avec le contenu et l'id_user
      $success = $PostC->addPost($contenuP, $id_user); 

     /* if ($success) {
          // Redirection après l'ajout d'un post
          header('Location: ' . $_SERVER['PHP_SELF']);
          exit; // Assurez-vous de terminer le script après la redirection
      } else {
          echo "Une erreur s'est produite lors de l'ajout du post.";
      }*/
  } else {
      echo "Le champ contenu est obligatoire.";
  }
}

if(isset($_POST['submitC'])) {
  $contenu = $_POST['commentaire']; // Récupérez l'ID de l'utilisateur depuis le formulaire
  $idP = $_POST['idP'];
  
  // Ajouter le commentaire
  $CommentC->addComment($contenu,$idP);
  
  /* Redirection vers la page ou le message de confirmation
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit();*/
}

// Traitement des likes et dislikes pour les posts
if (isset($_POST['like'])) {
  $postId = $_POST['like'];
  $PostC->likePost($postId);
  /* Recharger la page après l'action
  header("Location: ".$_SERVER['PHP_SELF']);
  exit();*/
}

if (isset($_POST['dislike'])) {
  $postId = $_POST['dislike'];
  $PostC->dislikePost($postId);
  /* Recharger la page après l'action
  header("Location: ".$_SERVER['PHP_SELF']);
  exit();*/
}

// Traitement des likes et dislikes pour les commentaires
if (isset($_POST['likeC'])) {
  $commentId = $_POST['likeC'];
  $CommentC->likeComment($commentId);
  /* Recharger la page après l'action
  header("Location: ".$_SERVER['PHP_SELF']);
  exit();*/
}



if (isset($_POST['dislikeC'])) {
  $commentId = $_POST['dislikeC'];
  $CommentC->dislikeComment($commentId);
  /* Recharger la page après l'action
  header("Location: ".$_SERVER['PHP_SELF']);
  exit();*/
}





// Récupération de la liste des posts
$list = $PostC->listPosts();

?>


<html lang="en">
<head>
<meta charset="utf-8">


<title>Social Network home news feed - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    margin-top:20px;
    background:#ebeef0;
}

.img-sm {
    width: 46px;
    height: 46px;
}

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 15px;
}

.panel .panel-footer, .panel>:last-child {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.panel-body {
    padding: 25px 20px;
}


.media-block .media-left {
    display: block;
    float: left
}

.media-block .media-right {
    float: right
}

.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto
}

.middle .media-left,
.middle .media-right,
.middle .media-body {
    vertical-align: middle
}

.thumbnail {
    border-radius: 0;
    border-color: #e9e9e9
}

.tag.tag-sm, .btn-group-sm>.tag {
    padding: 5px 10px;
}

.tag:not(.label) {
    background-color: #fff;
    padding: 6px 12px;
    border-radius: 2px;
    border: 1px solid #cdd6e1;
    font-size: 12px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .15s;
    transition: all .15s;
}
.text-muted, a.text-muted:hover, a.text-muted:focus {
    color: #acacac;
}
.text-sm {
    font-size: 0.9em;
}
.text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
    line-height: 1.25;
}

.btn-trans {
    background-color: transparent;
    border-color: transparent;
    color: #929292;
}

.btn-icon {
    padding-left: 9px;
    padding-right: 9px;
}

.btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
    padding: 5px 10px !important;
}

.mar-top {
    margin-top: 15px;
}
    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<section id="hero">
      <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

          <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

          <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active">
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2 class="animate__animated animate__fadeInDown">Please give us your review respectfully </h2>
                  <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                </div>
              </div>
            </div>
  </section>
<div class="container bootdey">
<div class="col-md-12 bootstrap snippets">
<div class="panel">
<div class="panel-body">
    <form method="POST" enctype="multipart/form-data">
        <div class="row">
        <div class="mar-top clearfix">
        <textarea class="form-control" id="contenuP" name="contenuP" rows="2" placeholder="What are you thinking?"></textarea>
            </div>
            <div class="mar-top clearfix">
                <button class="btn btn-sm btn-primary pull-right" type="submit" name="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>
                <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a>
            </div>
        </div>
    </form>
</div> 
</div>

<?php 
foreach ($list as $Post) {
?>
<div class="panel">
  <div class="panel-body">
    <div class="media-block">
      <!-- Utiliser une image d'avatar aléatoire -->
      <?php
      $randomNumber = rand(1, 8);
      $imagePath = "https://bootdey.com/img/Content/avatar/avatar" . $randomNumber . ".png";
      ?>
      <a class="media-left" href="#">
        <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo $imagePath; ?>">
      </a>
      <div class="media-body">
        <div class="mar-btm">
          <!-- Affichage de l'id utilisateur -->
          <a href="#" class="btn-link text-semibold media-heading box-inline">User <?php echo $Post['id_user']; ?></a>
        </div>
        <!-- Affichage du contenu du post -->
        <p><?php echo $Post['contenuP']; ?></p>
        <div class="pad-ver">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idP" value="<?php echo $Post['idP']; ?>">
            <a><input type="text" class="form-control" id="commentaire" name="commentaire" placeholder="Enter A Comment"></a>
            <button type="submit" class="btn btn-sm btn-default btn-hover-primary" name="submitC">Comment</button>
          </form>
          <div class="btn-group">
    <form method="POST">
        <button type="submit" class="btn btn-sm btn-default btn-hover-success" name="like" value="<?php echo $Post['idP']; ?>"><i class="fa fa-thumbs-up"></i> <?php echo $Post['NbLikePost']; ?></button>
        <button type="submit" class="btn btn-sm btn-default btn-hover-danger" name="dislike" value="<?php echo $Post['idP']; ?>"><i class="fa fa-thumbs-down"></i> <?php echo $Post['NbDislikePost']; ?></button>
    </form>
</div>

        </div>
        <hr>
        <!-- Affichage des commentaires pour ce post -->
        <?php
        $comments = $CommentC->getCommentsByPostId($Post['idP']);
        foreach ($comments as $comment) {
        ?>
        <div class="media-block">
          <!-- Utiliser une image d'avatar aléatoire -->
      <?php
      $randomNumber = rand(1, 8);
      $imagePath = "https://bootdey.com/img/Content/avatar/avatar" . $randomNumber . ".png";
      ?>
      <a class="media-left" href="#">
        <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo $imagePath; ?>">
      </a>
          <div class="media-body">
            <div class="mar-btm">
              <!-- Affichage du nom de l'utilisateur -->
              <a href="#" class="btn-link text-semibold media-heading box-inline">User</a>
              <!-- Affichage de la date du commentaire -->
              <p class="text-muted text-sm"><i class="fa fa-clock-o"></i> <?php echo $comment['datee']; ?></p>
            </div>
            <!-- Affichage du contenu du commentaire -->
            <p><?php echo $comment['contenuC']; ?></p>
            <div class="pad-ver">
            <div class="btn-group">
    <form method="POST">
        <button type="submit" class="btn btn-sm btn-default btn-hover-success" name="likeC" value="<?php echo $comment['id']; ?>"><i class="fa fa-thumbs-up"></i><?php echo $comment['NbLikeComment'] ?></button>
        <button type="submit" class="btn btn-sm btn-default btn-hover-danger" name="dislikeC" value="<?php echo $comment['id']; ?>"><i class="fa fa-thumbs-down"></i><?php echo $comment['NbDislikeComment'] ?></button>
    </form>
</div>

            </div>
          </div>
        </div>
        <hr>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
}
?>

</div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
  
</script>
</body>

</html>

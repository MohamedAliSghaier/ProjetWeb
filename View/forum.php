<?php

include '../Controller/commentC.php';
include '../Model/comment.php';

$CommentC = new commentC();


if(isset($_POST['submit']))
{
  

  

  
    $Comment=new comment ($_POST['commentaire']);
  $CommentC->addcomment($Comment);

 
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

<form method="POST" encytype="multipart/form-data" >
  <h2>Add Comment </h2>
  <div class="mb3"  >
    <label >Commentaire</label>
    <input type="text" class="form-control" id="commentaire" name="commentaire" placeholder="Enter A Comment">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<table class="table ProductsTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">id_user</th>
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
                    <td><?php echo $Comment['Id']; ?></td>
                    <td><?php echo $Comment['id_user']; ?></td>
                    <td><?php echo $Comment['IdP']; ?></td>
                    <td><?php echo $Comment['contenu']; ?></td>
                    <td><?php echo $Comment['datee']; ?></td>

</td>
<?php 
echo'
<td>
    <button class="btn btn-primary"><a  href="update.php?updateid='.$Comment['Id'].'"class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$Comment['Id'].'" class="text-light">Delete</a></button>
  </td>'
  ?>
  </tr>
                
               
            <?php
            }
            ?>
  </tbody>
</table>
</body>
</html>
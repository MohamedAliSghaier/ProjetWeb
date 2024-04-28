<?php

include '../Controller/commentC.php';


$CommentC = new commentC();


if(isset($_GET['updateid']))
{
  

  

    $Id=$_GET['updateid'];
    $commentlist=$CommentC->getcomment($Id);

 
}

if(isset($_POST['submit']))
{
  

  

  
  $CommentC->updatecomment($Id,$_POST['commentaire']);

 
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




  <?php 
            foreach ($commentlist as $Comment){
                ?>

<form method="POST" encytype="multipart/form-data" >
  <h2>Update Comment </h2>
  <div class="mb3">
    <label >Commentaire</label>
    <input type="text" class="form-control" id="commentaire" name="commentaire" Value="<?php echo $Comment['contenu']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php 
            }
               ?>
    

                
               
  </tbody>
</table>
</body>
</html>
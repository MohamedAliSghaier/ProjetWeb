<?php

include('../connexion/config.php');
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
">
    <title>Vie operation</title>
</head>
<body>
    <div class="container"></div>
    <button class="btn btn-primary my-5"><a href="../shop/shop.php" class="text-light">Add Product</a></button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

  <?php

 $sql="Select * from images";
 $result=mysqli_query($con,$sql);
 if ($result)
 {
    while($row=mysqli_fetch_assoc($result))
    {
      $image=$row["file"];
      $Id=$row["Id"];
      $name=$row["name"];
      $price=$row["price"];
      echo '<tr>
      <th scope="row">'.$image.'</th>
      <td>'.$Id.'</td>
      <td>'.$name.'</td>
      <td>'.$price.'</td>
      <td>
    <button class="btn btn-primary"><a href="update.php" class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?deleteid='.$Id.'" class="text-light">Delete</a></button>
  </td>
    </tr>';

    }
 }
   ?>
  
  </tbody>
</table>
    
</body>
</html>
<?php

include('../connexion/config.php');
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $file_name= $_FILES["image"]["name"];
    $tempname= $_FILES['image']['tmp_name'];
    $folder= 'Images/'.$file_name;

    $query= mysqli_query($con,"Insert into images (name,price,file) values ('$name','$price','$file_name')");
    if(move_uploaded_file($tempname,$folder))
    {
        echo "File uploaded succesfully";
    } else
    {
        echo "File not uploaded";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
">
  
  <title>Document</title>
</head>

  <body>
   
  <div class="container my-5">
    <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    <label>Product Name</label>
    <input type="text" class="form-control"  name="name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Product Price</label>
    <input type="text" class="form-control"  name="price" autocomplete="off">
  </div>
      <input type="file" name="image" />
      <br />
      <button type="submit" name="submit">Submit</button>
    </form>
    </div>
    <div>
        <?php
         $res = mysqli_query($con,"select * from images");
         while ($row=mysqli_fetch_assoc($res)){
        ?>
        <img src="Images/<?php echo $row["file"]  ?>" />
        <?php } ?>
    </div>
  </body>
</html>

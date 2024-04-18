<?php
   include("header.php");
   include_once "../model/booking.php";

   $bookings = Booking::getAllBookings();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <style>
        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
        }
        .card-title {
            font-size: 1.5em; 
            color: #333; 
            margin-bottom: 10px; 
        }
        .card-text {
            font-size: 1.1em; 
            color: #666; 
            margin-bottom: 15px; 
        }
        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff; 
        }
        .btn-primary:hover {
            background-color: #0056b3; 
            border-color: #0056b3; 
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Bookings</h1>
        <div class="row">
            <?php foreach ($bookings as $booking): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="../uploads/<?php echo $booking['photo']; ?>" class="card-img-top" alt="<?php echo $booking['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $booking['name']; ?></h5>
                            <p class="card-text"><?php echo $booking['description']; ?></p>
                            <p class="card-text">Price: $<?php echo $booking['price']; ?></p>
                            <p class="card-text">Date: <?php echo $booking['date']; ?></p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>


<?php
   include("footer.html");
?>

<?php

include_once "../config.php";
include_once "../model/booking.php";

// Fetch bookings from the database
$bookings = Booking::getAllBookings();

// Pass the bookings data to the view
include "../view/bookingsList.php";




// Check if it's a POST request to add a new booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $date = $_POST["date"];
    $photo = $_FILES["photo"]["name"];
    $target_dir = "../uploads/"; 
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "png");
    if (in_array($imageFileType, $extensions_arr)) {
        $booking = new Booking($name, $description, $price, $date, $photo);
        $success = $booking->save();
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

  
        
        
        exit;
    }

   

    if ($success) {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // If AJAX request, send JSON response
            header('Content-Type: application/json');
            echo json_encode(["message" => "Booking added successfully!"]);
        } else {
            // If regular request, redirect to dashboard
            header("Location: ../view/dashboard.php");
            exit();
        }
    } else {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // If AJAX request, send JSON response
            header('Content-Type: application/json');
            echo json_encode(["error" => "Failed to add booking."]);
        } else {
            // If regular request, display error message
            echo "Failed to add booking.";
        }
    }
}





?>

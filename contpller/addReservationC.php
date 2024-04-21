<?php
include_once "../config.php";
session_start(); // Start session if not already started
include_once "../model/reservation.php";

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']); // Assuming user_id is set in session when logged in
}

// Check if the request is an AJAX request
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    if(isLoggedIn()) {
        // Get user ID from session
        $userId = $_SESSION['user_id']; // Replace 'user_id' with the actual session variable name
        
        // Get booking ID from the AJAX request
        if(isset($_POST['bookingId'])) {
            $bookingId = $_POST['bookingId'];
            
            // Get user details from the database
            $pdo = config::getConnexion();
            $stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($user) {
                // User details found
                $userName = $user['username'];
                $userEmail = $user['email'];
                
                // Create a new reservation object
                $reservation = new Reservation($userId, $userName, $userEmail, $bookingId);
                
                // Save the reservation to the database
                $result = $reservation->save();
                
                // Return response to the client
                if($result) {
                    echo json_encode(array('success' => true, 'message' => 'Reservation successful!'));
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Reservation failed.'));
                }
            } else {
                // User details not found
                echo json_encode(array('success' => false, 'message' => 'User details not found.'));
            }
        } else {
            // Booking ID is missing
            echo json_encode(array('success' => false, 'message' => 'Booking ID is missing.'));
        }
    } else {
        // User is not logged in
        echo json_encode(array('success' => false, 'message' => 'You are not logged in.'));
    }
} else {
    // Redirect to login page if it's not an AJAX request
    exit();
}
?>

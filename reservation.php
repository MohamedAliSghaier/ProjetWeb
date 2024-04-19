<?php

include_once "../config.php";

class Reservation {
    private $id;
    private $userId;
    private $userName;
    private $userEmail;
    private $bookingId;
    
    public function __construct($userId, $userName, $userEmail, $bookingId) {
        $this->id = $this->generateUniqueID(); // Generate unique ID
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->bookingId = $bookingId;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getUserId() {
        return $this->userId;
    }
    
    public function setUserId($userId) {
        $this->userId = $userId;
    }
    
    public function getUserName() {
        return $this->userName;
    }
    
    public function setUserName($userName) {
        $this->userName = $userName;
    }
    
    public function getUserEmail() {
        return $this->userEmail;
    }
    
    public function setUserEmail($userEmail) {
        $this->userEmail = $userEmail;
    }
    
    public function getBookingId() {
        return $this->bookingId;
    }
    
    public function setBookingId($bookingId) {
        $this->bookingId = $bookingId;
    }
    
    // Method to generate a unique ID
    private function generateUniqueID() {
        // Generate a random 4-digit ID
        $id = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Check if the generated ID already exists in the database
        // Assuming $pdo is defined in config.php and accessible here
        $pdo = config::getConnexion();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservation WHERE id = ?");
        $stmt->execute([$id]);
        $count = $stmt->fetchColumn();
        
        // If the ID already exists, generate a new one
        while ($count > 0) {
            $id = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $stmt->execute([$id]);
            $count = $stmt->fetchColumn();
        }

        // Return the unique ID
        return $id;
    }
    
    
    public function save() {
        // Assuming $pdo is defined in config.php and accessible here
        $pdo = config::getConnexion();
        
        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO reservation (id, userId, userName, userEmail, bookingId) VALUES (?, ?, ?, ?, ?)");
        
        // Bind parameters and execute the statement
        $result = $stmt->execute([$this->id, $this->userId, $this->userName, $this->userEmail, $this->bookingId]);
        
        return $result; // Return the result of the execution
    }

    public static function getAllReservations() {
        try {
            $pdo = config::getConnexion();
            $stmt = $pdo->query("SELECT * FROM reservations");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>

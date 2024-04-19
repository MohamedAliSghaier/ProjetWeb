<?php

include_once "../config.php";

class Booking {
    private $id;
    private $name;
    private $description;
    private $price;
    private $date;
    private $photo;

    public function __construct($name, $description, $price, $date, $photo, $id = null) {
        $this->id = $id ?? $this->generateUniqueId();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->date = $date;
        $this->photo = $photo;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function save() {
        try {
            $pdo = config::getConnexion();
            $stmt = $pdo->prepare("INSERT INTO bookings (id, name, description, price, date, photo) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$this->id, $this->name, $this->description, $this->price, $this->date, $this->photo]);
            return true; 
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllBookings() {
        try {
            $pdo = config::getConnexion();
            $stmt = $pdo->query("SELECT * FROM bookings");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getBookingById($id) {
        try {
            $pdo = config::getConnexion();
    
            // Prepare the SQL statement
            $stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = :id");
    
            // Bind the parameter
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
            // Execute the query
            $stmt->execute();
    
            // Fetch the result
            $booking = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($booking) {
                return $booking;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            // Handle any errors
            return null;
        }
    }
    


    public function delete() {
        try {
            $pdo = config::getConnexion();
            $stmt = $pdo->prepare("DELETE FROM bookings WHERE id = ?");
            $stmt->execute([$this->id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update() {
        try {
            $pdo = config::getConnexion();
            $stmt = $pdo->prepare("UPDATE bookings SET name = ?, description = ?, price = ?, date = ?, photo = ? WHERE id = ?");
            $stmt->execute([$this->name, $this->description, $this->price, $this->date, $this->photo, $this->id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    private function generateUniqueId() {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
    }
}

?>

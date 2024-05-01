<?php
include_once '../config.php';

class User {
    private $pdo;
    private $maxAttempts = 10; 
    public function __construct() {
        
        $this->pdo = config::getConnexion();
    }

    public function login($email, $password) {
        $stmt = $this->pdo->prepare("SELECT id, username, photo, email, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            return $user;
        }
        return false;
    }
    

    public function register($name, $email, $password, $photo) {
        
        $id = $this->generateUniqueID();
        
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
       
        $stmt = $this->pdo->prepare("INSERT INTO users (id, username, email, password, photo) VALUES (?, ?, ?, ?, ?)");
        
        
        return $stmt->execute([$id, $name, $email, $hashedPassword, $photo]);
    }

    private function generateUniqueID() {
      
        $suffix = bin2hex(random_bytes(8));

       
        $id = uniqid('', true) . $suffix;

        
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $count = $stmt->fetchColumn();
        
       
        $attempts = 1;
        while ($count > 0 && $attempts < $this->maxAttempts) {
            $id = uniqid('', true) . bin2hex(random_bytes(8));
            $stmt->execute([$id]);
            $count = $stmt->fetchColumn();
            $attempts++;
        }

       
        if ($count > 0) {
            throw new Exception("Failed to generate a unique ID after {$this->maxAttempts} attempts.");
        }
        
        
        return $id;
    }
}

?>

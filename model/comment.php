<?php
class Comment {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addComment($userId, $commentText) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO comments (user_id, comment_text) VALUES (?, ?)");
            $success = $stmt->execute([$userId, $commentText]);
            
            if ($success) {
                return true; 
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            // Handle database errors
            error_log("Failed to add comment: " . $e->getMessage()); 
            return false;
        }
    }
    
}
?>

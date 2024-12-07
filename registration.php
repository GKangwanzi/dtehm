<?php
class MemberRegistration {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($name, $email, $password, $referrerId = null) {
        try {
            // Begin transaction
            $this->pdo->beginTransaction();

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert new member into the members table
            $stmt = $this->pdo->prepare("INSERT INTO members (name, email, password, joined_at) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$name, $email, $hashedPassword]);

            // Get the ID of the newly registered member
            $newMemberId = $this->pdo->lastInsertId();

            // If a referrer ID is provided, update the referrals table
            if ($referrerId) {
                $this->addReferral($referrerId, $newMemberId);
            }

            // Commit transaction
            $this->pdo->commit();

            echo "Member registered successfully with ID: " . $newMemberId;
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $this->pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }

    private function addReferral($referrerId, $newMemberId) {
        // Insert the direct referral
        $stmt = $this->pdo->prepare("INSERT INTO referrals (referrer_id, referee_id, level) VALUES (?, ?, 1)");
        $stmt->execute([$referrerId, $newMemberId]);

        // Propagate the referral tree
        for ($level = 2; $level <= 8; $level++) {
            // Find the next referrer in the chain
            $stmt = $this->pdo->prepare("SELECT referrer_id FROM referrals WHERE referee_id = ? AND level = ?");
            $stmt->execute([$referrerId, $level - 1]);
            $nextReferrer = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$nextReferrer || !$nextReferrer['referrer_id']) {
                break; // No more referrers in the chain
            }

            // Add the referral relationship for the next level
            $stmt = $this->pdo->prepare("INSERT INTO referrals (referrer_id, referee_id, level) VALUES (?, ?, ?)");
            $stmt->execute([$nextReferrer['referrer_id'], $newMemberId, $level]);

            // Move up the chain
            $referrerId = $nextReferrer['referrer_id'];
        }
    }
}

// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// Example usage
$registration = new MemberRegistration($pdo);
$name = "John Doe";
$email = "johndoe@example.com";
$password = "securepassword";
$referrerId = 1; // Replace with actual referrer ID or null if no referrer

$registration->register($name, $email, $password, $referrerId);
?>

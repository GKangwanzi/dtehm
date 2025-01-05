<?php
class WalletManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getCurrentBalance($walletName, $userId) {
        // Validate wallet name
        $validWallets = ['commissions', 'deposits'];
        if (!in_array($walletName, $validWallets)) {
            throw new Exception("Invalid wallet name");
        }

        // Define table names based on the wallet name
        $walletTable = $walletName;
        $withdrawTable = $walletName === 'commissions' ? 'commission_withdraws' : 'orders';

        try {
            // Calculate total deposits in the wallet
            $walletQuery = "SELECT COALESCE(SUM(amount), 0) AS total FROM $walletTable WHERE member = '$userId' ";
            $stmt = $this->pdo->prepare($walletQuery);
            $stmt->execute(['member' => $userId]);
            $totalWallet = $stmt->fetchColumn();

            // Calculate total withdrawals from the wallet
            $withdrawQuery = "SELECT COALESCE(SUM(amount), 0) AS total FROM $withdrawTable WHERE member = '$userId' ";
            $stmt = $this->pdo->prepare($withdrawQuery);
            $stmt->execute(['member' => $userId]);
            $totalWithdraws = $stmt->fetchColumn();

            // Calculate the current balance
            $currentBalance = $totalWallet - $totalWithdraws;

            return $currentBalance;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}


?>
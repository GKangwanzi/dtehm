<?php
// Configuration
$apiUrl = "https://api.example.com/api/disbursements/disburse"; // Replace with the actual endpoint
$statusUrl = "https://api.example.com/api/disbursements/status"; // Replace with the transaction status endpoint
$redirectUrl = "https://yourwebsite.com/success.php"; // Replace with your success page URL
$token = "your-jwt-token"; // Replace with your actual JWT token

// Disbursement details
$walletId = "f72eba17-6b78-4f6a-b477-a54ff2b7f9b3"; // Replace with your wallet ID
$payee = $_GET['phone']; // Replace with the recipient's mobile number
$amount = 500; // Replace with the amount to send
$currency = "UGX";
$category = "MobileMoney";
$externalId = "DTEHM-".rand(); // Unique external reference ID

// Initiate cURL for the disbursement
$ch = curl_init($apiUrl);

// Request payload
$data = [
    "category" => $category,
    "currency" => $currency,
    "walletId" => $walletId,
    "externalId" => $externalId,
    "payee" => $payee,
    "amount" => $amount,
    "payerNote" => "Payment for services",
    "payeeNote" => "Thank you for your service"
];

// Set cURL options
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $token"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the request
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Check if the request was successful
if ($httpCode === 200) {
    $responseData = json_decode($response, true);
    $transactionId = $responseData['id'] ?? null;

    if ($transactionId) {
        // Check transaction status
        $statusCheckUrl = $statusUrl . "/" . $transactionId;
        $chStatus = curl_init($statusCheckUrl);

        curl_setopt($chStatus, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token"
        ]);
        curl_setopt($chStatus, CURLOPT_RETURNTRANSFER, true);

        $statusResponse = curl_exec($chStatus);
        $statusCode = curl_getinfo($chStatus, CURLINFO_HTTP_CODE);
        curl_close($chStatus);

        if ($statusCode === 200) {
            $statusData = json_decode($statusResponse, true);
            $transactionStatus = $statusData['status'] ?? null;

            if ($transactionStatus === "Success") {
                // Redirect to success page
                header("Location: $redirectUrl");
                exit;
            } else {
                echo "Transaction status: $transactionStatus";
            }
        } else {
            echo "Failed to fetch transaction status. HTTP Code: $statusCode";
        }
    } else {
        echo "Transaction ID not found in the response.";
    }
} else {
    echo "Disbursement failed. HTTP Code: $httpCode. Response: $response";
}
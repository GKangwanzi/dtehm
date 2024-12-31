<?php
include "includes/dbhandle.php";

$client_id = "pay-d1b52074-078d-454f-8919-5358cc4c951b";
$client_secret = "IO-uJSnPjbYN9BaOUJQB2UukDj3wKOSpU2ap";
$auth_url = "https://id.iotec.io/connect/token";
$status_url = "https://pay.iotec.io/api/collections/status/";

// Step 1: Get access token
$data = http_build_query([
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'client_credentials'
]);
 
$options = [
    'http' => [
        'header'  => "Content-Type: application/x-www-form-urlencoded",
        'method'  => 'POST',
        'content' => $data
    ]
];

$context  = stream_context_create($options);
$response = file_get_contents($auth_url, false, $context);
if ($response === FALSE) {
    die("Failed to authenticate.");
}

$token = json_decode($response, true)['access_token'];

// Step 2: Check payment status
$transaction_id = $_GET['id'];
$options = [
    'http' => [
        'header'  => "Authorization: Bearer $token\r\n",
        'method'  => 'GET'
    ]
];

$context  = stream_context_create($options);
$response = file_get_contents($status_url . $transaction_id, false, $context);

if ($response === FALSE) {
    die("Failed to check transaction status.");
}

$status = json_decode($response, true)['status'];

// Step 3: Update transaction in database
$sql = "UPDATE commission_balance SET status = ? WHERE paymentID = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $status, $transaction_id);
$stmt->execute();

// Step 4: Redirect based on status
if ($status === "Success") {
    header("Location: success.php");
} else {
    header("Location: failure.php");
}
exit;
?>
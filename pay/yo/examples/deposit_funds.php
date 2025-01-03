<?php
/**
 * This example shows settings to use when submitting a request to get a USSD mobile money PIN
 * prompt to transfer funds from a mobile money user to your Yo! Payments Account
 */

require './YoAPI.php';

// Create a new YoAPI instance with Yo! Payments Username and Password
//Set below variables to your Yo! Payments username and password accordingly
$username = "100515241441"; 
$password = "TrMF-MVCZ-zVJm-N4ay-k2PW-49dJ-mCue-LOCP";
$mode = "production";//In production, set this to "production"
$yoAPI = new YoAPI($username, $password, $mode);

// Create a unique transaction reference that you will reference this payment with
$transaction_reference = date("YmdHis").rand(1,100);
$yoAPI->set_external_reference($transaction_reference);

$response = $yoAPI->ac_deposit_funds('256785407551', 1000, 'Reason for transfer of funds');

if($response['Status']=='OK'){
	echo "Payment made! Funds have been deposited onto your account. Transaction Reference = ".$response['TransactionReference'].". Thank you for using Yo! Payments";

	// Save this transaction for future reference
}else{
	echo "Yo Payments Error: ".$response['StatusMessage'];
}

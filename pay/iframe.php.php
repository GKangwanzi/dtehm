<?php 

	require_once('OAuth.php');

	$api = 'https://www.pesapal.com';
	 
	$token = $params 	= NULL;
	$iframelink 		= $api.'/api/PostPesapalDirectOrderV4';
	
	//Kenyan keys
	$consumer_key 		= "eWaD78uiT/1VLvvty8zzWhnUsajVfh5b";  
	$consumer_secret 	= "iw1NN5ibZsdqViVRv/zRhOLMk4s=";
	 
	$signature_method	= new OAuthSignatureMethod_HMAC_SHA1();
	$consumer 			= new OAuthConsumer($consumer_key, $consumer_secret);
	
	//get form details 
	$reference = "dtehm".getRandomString($n);    
	



	$amount 		= str_replace(',','',$_POST['amount']); // remove thousands seperator if included
	$amount 		= number_format($amount, 2); //format amount to 2 decimal places
	$desc 			= $_POST['description'];
	$type 			= 'MERCHANT';	
	$phonenumber	= $_POST['phone_number'];
	$currency 		= 'UGX';
	$member = $_POST["memberID"]; 
	$n = 10;  
	function getRandomString($n) {
    return bin2hex(random_bytes($n / 2));
	}   
	$reference = "dtehm".getRandomString($n);  //unique transaction id, generated by merchant.
	$callback_url = 'http://localhost/dtehm/pay/pesapal-ipn-listener.php';
	//$callback_url 	= '[domain]/pesapalPHPExample/redirect.php'; //URL user to be redirected to after payment
	

	$sql = "SELECT * FROM members WHERE memberID='$member' ";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$first_name = $row['fname'];
	$last_name = $row['lname'];
	$email = $row['email'];



	//Record order in your database.
	//$database = new pesapalDatabase();
	//$database->store($_POST); 
	$sql = "INSERT INTO deposits (amount, member, phone, transactionRef, date, status)
    VALUES ('$amount', '$member', '$phonenumber', '$reference', '$date', '$status')";
		
	$post_xml	= "<?xml version=\"1.0\" encoding=\"utf-8\"?>
				   <PesapalDirectOrderInfo 
						xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" 
					  	xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" 
					  	Currency=\"".$currency."\" 
					  	Amount=\"".$amount."\" 
					  	Description=\"".$desc."\" 
					  	Type=\"".$type."\" 
					  	Reference=\"".$reference."\" 
					  	FirstName=\"".$first_name."\" 
					  	LastName=\"".$last_name."\" 
					  	Email=\"".$email."\" 
					  	PhoneNumber=\"".$phonenumber."\" 
					  	xmlns=\"http://www.pesapal.com\" />";
	$post_xml = htmlentities($post_xml);
	
	//post transaction to pesapal
	if(mysqli_query($con, $sql)){
	$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
	$iframe_src->set_parameter("oauth_callback", $callback_url);
	$iframe_src->set_parameter("pesapal_request_data", $post_xml);
	$iframe_src->sign_request($signature_method, $consumer, $token);
}else{
	echo "ERROR: Something went wrong";
}
?>  

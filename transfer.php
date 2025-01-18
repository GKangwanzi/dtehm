<?php 
include "includes/dbhandle.php";
include "includes/head2.php";
if (isset($_POST['transfer'])) {

$amount = $_POST["amount"];
$member = $_POST["memberID"];

$status = 'paid';
$status2 = 'Complete';
$description = 'Transfer from commission';
$n = 10;  
	function getRandomString($n) {
    return bin2hex(random_bytes($n / 2));
	}   
$transactionID = "dtehm".getRandomString($n);
$date = $date = date("l jS \of F Y h:i:s A");

// insert into members
$stmt = $con->prepare('INSERT INTO commission_withdraws (member, amount, status, description) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $member, $amount, $status, $description);
$stmt->execute();

 

// insert into members
$stmt2 = $con->prepare('INSERT INTO deposits (amount, member, status, transactionID, transactionRef, date) VALUES (?, ?, ?, ?, ?, ?)');
$stmt2->bind_param('ssssss', $amount, $member, $status2, $transactionID, $description, $date);

if ($stmt2->execute()) {
	            echo '<div class="maintenance-pages">
<div class="container-fluid p-0">
<div class="row">

<div class="col-xl-12 align-self-center">
<div class="row">
<!-- col-md-8 -->
<div class="col-md-4 mx-auto">
<div class="card p-3 mb-0">
<div class="card-body">
<div class="text-center">
<div class="mb-4 text-center">
<i data-feather="check"></i>
</div>

<div class="coming-soon-img">
<svg style="height: 60px; width: 60px; border-width: 2px; border-style: solid; border-radius: 50%; padding: 10px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
</div>

<div class="text-center">
<h3 class="mt-4 fw-semibold text-black text-capitalize">Transfer Completed</h3>
<p class="text-muted">Your commission funds have been transfered to your wallet balance. You can now use it to purchase products</p>
</div>

<a class="btn btn-primary mt-3 me-1" href="deposit.php">Back to Deposits</a>

</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>';
}


}
?>
<?php 
include "core/insert.php"; 
include "includes/dbhandle.php";
include "includes/con.php";
include "includes/head.php";
include "core/sms.php" 
?>

<!-- Left Sidebar Start -->
<?php 
    if ($_SESSION['role']=='admin') { 
        include 'includes/left-menu.php';
    }elseif($_SESSION['role']=='member') { 
        include 'includes/menu-member.php';
    }elseif($_SESSION['role']=='stockist') { 
        include 'includes/menu-stockist.php';
    }else{

    }
 ?>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
<div class="content">

<!-- Start Content-->
<div class="container-fluid">

<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
    <div class="flex-grow-1">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Deposit
        </button>
        <div align="center">
    
</div>
    </div>

<div class="text-end">

 
<?php

if (isset($_POST['pay'])){
$client_id = "pay-d1b52074-078d-454f-8919-5358cc4c951b";
$client_secret = "IO-uJSnPjbYN9BaOUJQB2UukDj3wKOSpU2ap";
$auth_url = "https://id.iotec.io/connect/token";
$payment_url = "https://pay.iotec.io/api/collections/collect";

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

// Step 2: Process payment
$payer = $_POST['payer'];
$amount = $_POST['amount'];
$payer_note = $_POST['payer_note'];
$payee_note = $_POST['payee_note'];
$wallet_id = "632f6a81-0dcc-4033-94ce-25cc2543dc4a";

$payment_data = json_encode([
    "category" => "MobileMoney",
    "currency" => "UGX",
    "walletId" => $wallet_id,
    "externalId" => uniqid(),
    "payer" => $payer,
    "payerNote" => $payer_note,
    "amount" => $amount,
    "payeeNote" => $payee_note
]);

$options = [
    'http' => [
        'header'  => "Authorization: Bearer $token\r\n" .
                     "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => $payment_data
    ]
];

$context  = stream_context_create($options);
$response = file_get_contents($payment_url, false, $context);

if ($response === FALSE) {
    die("Payment request failed.");
} 

$transaction = json_decode($response, true);

// Step 3: Save transaction to database
$sql = "INSERT INTO commission_balance (paymentID, status, payer, amount) VALUES (?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sssd", $transaction['id'], $transaction['status'], $payer, $amount);
$stmt->execute();
 
// Redirect to status check
sleep(30);
echo "<script type='text/javascript'> 
window.location.replace('status_check.php?id=" . $transaction['id']."')
</script>"; 
//exit(header("Location: status_check.php?id=" . $transaction['id']));
exit;
}
?> 
    </div>
</div>




    <!-- Datatables  -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Deposit Transactions</h5>
                </div><!-- end card header -->

                <div class="card-body">

<?php
$tableName = "commission_balance";
$tableid = "paymentID";
$sql = "SELECT * FROM $tableName";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Amount</th>";
echo "<th>Phone Number</th>";
echo "<th>Status</th>";
echo "<th>Date</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['paymentID'] . "</td>";
echo "<td>" . $row['amount']. "</td>";
echo "<td>" . $row['payer'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "</tr>";
} 
echo "</table>";
// Free result set
mysqli_free_result($result);
} else{
echo "No records matching your query were found.";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

    </div>

</div>
</div>
</div>


<!-- Register Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalgridLabel">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">New Deposit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

<form action="" method="POST">

<div class="mb-3">
<input class="form-control" type="text" id="msisdn" name="payer" placeholder="e.g. +256701345678" required>
</div>
<div class="mb-3">
    <input disabled class="form-control" id="currency" name="currency" required type="text" value="UGX" class="form-control">
</div>
<div class="mb-3">
    <input class="form-control" type="number" step="0.01" id="amount" name="amount" placeholder="e.g. 500.00" required>
</div>
<div class="mb-3">
    <input hidden class="form-control" type="text" id="description" name="payer_note" value="dtehm payment">
</div>

<div class="mb-3">
    <input hidden class="form-control" type="text" id="description" name="payee_note" value="dtehm payment" >
</div>

<div class="mb-3">
    <button name="pay"  class="btn btn-primary form-control" type="submit">Initiate Payment</button>
</div>

</form>
        </div> <!-- end modal body -->
    </div> <!-- end modal content -->
</div>




</div> <!-- container-fluid -->
</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
<div class="container-fluid">
    <div class="row">
        <div class="col fs-13 text-muted text-center">
            &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">JulyBrands Digital</a> 
        </div>
    </div>
</div>
</footer>
<!-- end Footer -->

</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->
<?php include "includes/footer.php" ?>





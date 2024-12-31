<?php include "core/insert.php" ?>
<?php include "includes/dbhandle.php" ?>
<?php include "includes/con.php" ?>
<?php include "includes/head.php" ?>
<?php include "core/sms.php" ?>

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
    </div>

<div class="text-end">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $accountNo = 'RELD30F5323FB'; // Replace with your account number
    $reference = bin2hex(random_bytes(16)); // Generate a unique reference (32 characters)
    $msisdn = $_POST['msisdn'];
    $currency = $_POST['currency'];
    $amount = $_POST['amount'];
    $description = $_POST['description'] ?? 'Payment Request';

    // Prepare the API request
    $url = 'https://payments.relworx.com/api/mobile-money/request-payment';
    $apiKey = 'd399cf9d73e1b2.xa3RB1GYpqhu6YVHztypkg'; // Replace with your actual API key

    $data = [
        'account_no' => $accountNo,
        'reference' => $reference,
        'msisdn' => $msisdn,
        'currency' => $currency,
        'amount' => (float)$amount,
        'description' => $description,
    ];

    $headers = [
        'Content-Type: application/json',
        'Accept: application/vnd.relworx.v2',
        'Authorization: Bearer ' . $apiKey,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Handle the response
    if ($httpCode === 200) {
        $responseData = json_decode($response, true);
        if ($responseData['success']) {
            echo '<p>Payment request successful: ' . htmlspecialchars($responseData['message']) . '</p>';
        } else {
            echo '<p>Payment request failed: ' . htmlspecialchars($responseData['message']) . '</p>';
        }
    } else {
        echo '<p>Failed to process payment request. HTTP Code: ' . $httpCode . '</p>';
    }
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
$tableName = "members";
$tableid = "memberID";
$sql = "SELECT * FROM $tableName WHERE memberID='BG000'";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Date</th>";
echo "<th>Phone Number</th>";
echo "<th>Amount</th>";
echo "<th>Status</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['memberID'] . "</td>";
echo "<td>" . $row['fname'].' '.$row['lname'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>                                                       
    <a aria-label='anchor' class='btn btn-sm bg-primary-subtle me-1' data-bs-toggle='tooltip' data-bs-original-title='Edit'>
        <i class='mdi mdi-pencil-outline fs-14 text-primary'></i>
    </a>
    <a href='core/delete.php?id=".$row['memberID']."&t=".$tableName."&tID=".$tableid."' aria-label='anchor' class='btn btn-sm bg-danger-subtle' data-bs-toggle='tooltip' data-bs-original-title='Delete'>
        <i class='mdi mdi-delete fs-14 text-danger'></i>
    </a>
</td>";
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
<input class="form-control" type="text" id="msisdn" name="msisdn" placeholder="e.g. +256701345678" required>
</div>
<div class="mb-3">
    <input class="form-control" id="currency" name="currency" required type="text" value="UGX" class="form-control">
</div>
<div class="mb-3">
    <input class="form-control" type="number" step="0.01" id="amount" name="amount" placeholder="e.g. 500.00" required>
</div>
<div class="mb-3">
    <input class="form-control" type="text" id="description" name="description" placeholder="Payment description">
</div>

<div class="mb-3">
    <button name="register" class="btn btn-primary form-control" type="submit">Initiate Payment</button>
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





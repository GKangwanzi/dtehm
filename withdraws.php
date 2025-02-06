<?php include "core/insert.php"; ?>
<?php include "includes/dbhandle.php"; ?>
<?php include "includes/con.php"; ?>
<?php include "includes/head.php"; ?>
<?php include "core/sms.php"; ?>

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
            Withdraw Now
        </button>
    </div>

<div class="text-end"> 

    </div>
</div>
<?php 

if (isset($_POST['withdraw'])) {

$memberid = $_SESSION['id'];
$sql = "SELECT SUM(amount) AS ctotal FROM commissions WHERE member = '$memberid' ";
if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $totalcommission = $row['ctotal'];
            } else{
                $totalcommission = 0;
            }
        }


$sql = "SELECT SUM(amount) AS cwtotal FROM commission_withdraws WHERE member = '$memberid' AND status='paid' ";
if($result = mysqli_query($con, $sql)){
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $totalwcommission = $row['cwtotal'];
            } else{
                $totalwcommission = 0;
            }
        }


$balance = $totalcommission - $totalwcommission;
$amount     = $_POST["amount"];
$member     = $_POST["memberID"];
$phone      = $_POST["phone"];

function getToken($clientId, $clientSecret) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://id.iotec.io/connect/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => http_build_query([
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'client_credentials'
        ]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/x-www-form-urlencoded"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        throw new Exception("Error getting token: " . $err);
    }

    $data = json_decode($response, true);
    if (isset($data['access_token'])) {
        return $data['access_token'];
    }

    throw new Exception("Failed to retrieve access token: " . $response);
}

function sendMoney($token, $body) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://pay.iotec.io/api/disbursements/disburse",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($body),
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $token",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        throw new Exception("Error collecting money: " . $err);
    }

    return json_decode($response, true);
}

// Example usage
try {
    $clientId = "pay-d1b52074-078d-454f-8919-5358cc4c951b"; // Replace with your actual client ID
    $clientSecret = "IO-uJSnPjbYN9BaOUJQB2UukDj3wKOSpU2ap"; // Replace with your actual client secret
    $walletId = "f72eba17-6b78-4f6a-b477-a54ff2b7f9b3"; // Replace with your actual wallet ID

    // Get the token
    $token = getToken($clientId, $clientSecret);

    // Prepare the body for collecting money
    $body = [
        "category" => "MobileMoney",
        "currency" => "UGX",
        "walletId" => $walletId,
        "externalId" => "any-thing-here",
        "payee" => $phone,
        "amount" => $amount,
        "payeeNote" => "DTEHM Commission Withdraw"
    ];

    // Collect money
    if($amount < 50 AND $amount < $balance){
        $response       = sendMoney($token, $body);
        $status         = "paid";
        $description    = "Withdraw to mobile money";
        $stmt           = $con->prepare('INSERT INTO commission_withdraws 
            (amount, phone, status, description, member)
        VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $amount, $phone, $status, $desc, $member);
        $stmt->execute();
            // Print the response
        print_r($response);
    }elseif($amount > 50 AND $amount < $balance){
        $status         = "unpaid";
        $description    = "Withdraw to mobile money";
        $stmt           = $con->prepare('INSERT INTO commission_withdraws 
            (amount, phone, status, description, member)
        VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $amount, $phone, $status, $desc, $member);
        $stmt->execute();
        echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
        Withdraw request submitted, It will be processed within 48Hours. Thank you
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
        </div>";
    }elseif($amount > $balance){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Your withdraw request has been declined, Amount is greater than the commission balance
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
        </div>";
    }
    


} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

}
?>

    <!-- Datatables  -->
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0"> All Withdraws</h5>
                </div><!-- end card header -->

                <div class="card-body">

<?php
$tableName = "commission_withdraws";
$tableid = "id";
$memberid = $_SESSION['id'];
$sql = "SELECT * FROM $tableName WHERE member='$memberid' ";
if($result = mysqli_query($con, $sql)){
if(mysqli_num_rows($result) > 0){
echo "<table id='datatable' class='table table-bordered dt-responsive table-responsive nowrap'>";
echo "<thead>";
echo "<tr>";
echo "<th>Amount</th>";
echo "<th>Recepient</th>";
echo "<th>Status</th>";
echo "<th>Date</th>";
echo "</tr>";
echo "</thead>";
while($row = mysqli_fetch_array($result)){
echo "<tr>"; 
echo "<td>" . $row['amount'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";

echo "<td>";
    echo "<span class='badge bg-primary-subtle text-primary fw-semibold'>".strtoupper($row['status'])."</span>";

echo "</td>";
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
            <h5 class="modal-title" id="exampleModalgridLabel">Withdraw Request</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
 
<form action="" method="POST">
<div class="mb-3">
<input type="number" min="100" required name="amount" id="simpleinput" placeholder="Enter Amount (Ugx)" class="form-control">
</div>
<div class="mb-3">
    <?php 
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM members WHERE memberID='$id' ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        ?>
    <input hidden type="text" value="<?php echo $row['mobileMoney']; ?>" name="phone" id="simpleinput" placeholder="Recepient Phone Number" class="form-control">
</div>
 
<div class="mb-3">
    <input type="text" hidden name="memberID" value="<?php echo $_SESSION['id']; ?>" id="simpleinput" class="form-control">
</div>

<div class="mb-3">
<input type="text" name="type" hidden value="MERCHANT" class="form-control" readonly="readonly" />
</div>

<div class="mb-3">
    <button name="withdraw" class="btn btn-primary form-control" type="submit">Initiate Deposit</button>
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





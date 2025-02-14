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
        <?php
        $day = date('l');

        if ($day == 'Saturday' OR $day =='Sunday') {
           echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
            Withdraw Now
        </button>';
        }else{
            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alldaysModal">
            Withdraw Now
        </button>';
        }

        ?>
        
    </div>

<div class="text-end"> 

    </div>
</div>
<?php 
if (isset($_POST['withdraw'])) {
$pay        = $_POST["amount"];

$memberid   = $_SESSION['id'];

$sqlo = "SELECT SUM(amount) AS mobilewithdraws FROM commission_withdraws WHERE account='mobile' ";
$resulto = mysqli_query($con, $sqlo);
$row = mysqli_fetch_array($resulto);
$twithdraws = $row['mobilewithdraws'];

$sql = "SELECT SUM(amount) AS cbtotal FROM commission_balance WHERE status='Success' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$availablepayout = $row['cbtotal']-$twithdraws; 


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

$commbalance = $totalcommission - $totalwcommission;

if ($pay > $commbalance) {
    echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        The amount you are withdrawing is more than the current commission balance. Please choose amount less than ".$commbalance."
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
        </div>";
}elseif($pay > $availablepayout){
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        This withdraw can not be handled now, Please try again later.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
        </div>";
} elseif($pay >= $commbalance){
     

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


$balance    = $totalcommission - $totalwcommission;
$pay        = $_POST["amount"];
//$amount     = $_POST["amount"];
$member     = $_POST["memberID"];
$phone      = $_POST["phone"];
$option     = $_POST['option'];
if ($pay <= 60000) {
    $amount = $pay + 600;
}elseif($pay > 60000 AND $pay < 500000) {
    $amount = $pay + 1200;
}elseif ($pay > 500000 AND $pay <= 1000000) {
    $amount = $pay +2000;
}elseif($pay > 1000000 AND $pay <= 5000000) {
    $amount = $pay + 2400;
}

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
    $walletId = "632f6a81-0dcc-4033-94ce-25cc2543dc4a"; // Replace with your actual wallet ID

    // Get the token
    $token = getToken($clientId, $clientSecret);

    // Prepare the body for collecting money
    $body = [
        "category" => "MobileMoney",
        "currency" => "UGX",
        "walletId" => $walletId,
        "externalId" => "any-thing-here",
        "payee" => $phone,
        "amount" => $pay,
        "payeeNote" => "DTEHM Commission Withdraw"
    ];

    // Collect money 
    if($amount < 150000 AND $amount <= $balance AND $option=='mobile' ){
        $response       = sendMoney($token, $body);
        $status         = "paid";
        $description    = "Withdraw to mobile money";
        $account        = "mobile";
        $stmt           = $con->prepare('INSERT INTO commission_withdraws 
            (amount, phone, status, description, member, account)
        VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $amount, $phone, $status, $desc, $member, $account);
        $stmt->execute();
            // Print the response
        print_r($response);
    }elseif($amount > 150000 AND $amount <= $balance AND $option=='mobile'){
        $status         = "unpaid";
        $description    = "Withdraw to mobile money";
        $account        = "mobile";
        $stmt           = $con->prepare('INSERT INTO commission_withdraws 
            (amount, phone, status, description, member, account)
        VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $amount, $phone, $status, $desc, $member, $account);
        $stmt->execute();
        echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
        Withdraw request submitted, It will be processed within 48Hours. Thank you
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
        </div>";
    }elseif($amount > 150000 AND $amount <= $balance AND $option=='bank'){
        $status         = "unpaid";
        $description    = "Withdraw to bank account";
        $account        = "bank";
        $stmt           = $con->prepare('INSERT INTO commission_withdraws 
            (amount, phone, status, description, member, account)
        VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $amount, $phone, $status, $desc, $member, $account);
        $stmt->execute();
        echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
        Withdraw request submitted, It will be processed within 48Hours. Thank you
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
        </button>
        </div>";
    }elseif($amount < 150000 AND $amount <= $balance AND $option=='bank'){
        $status         = "unpaid";
        $description    = "Withdraw to bank account";
        $account        = "bank";
        $stmt           = $con->prepare('INSERT INTO commission_withdraws 
            (amount, phone, status, description, member, account)
        VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $amount, $phone, $status, $desc, $member, $account);
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
<input type="number" min="5000" required name="amount" id="simpleinput" placeholder="Enter Amount (Ugx)" class="form-control">
</div>
<div class="mb-3">
    <label for="example-select" class="form-label">Withdraw Option</label>
    <select class="form-select" name="option" id="example-select" class="choices form-select" name="branch">
        <option value="mobile">Mobile Money </option>
        <option value="bank">Bank/Cheque</option>
    </select>
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
<table>
    <tr>
        <th>RANGE</th>
        <th>FEES</th>
    </tr>
    <tr>
        <td>500 - 60,000</td>
        <td>600</td>
    </tr>
    <tr>
        <td>60,001 - 500,000</td>
        <td>1,200</td>
    </tr>
    <tr>
        <td>500,001 - 1,000,000</td>
        <td>2,000</td>
    </tr>
    <tr>
        <td>1,000,001 - 5,000,000</td>
        <td>2,400</td>
    </tr>
    
</table>
</div>
<div class="mb-3">
    <button name="withdraw" class="btn btn-primary form-control" type="submit">Initiate Withdraw</button>
</div>
 
</form>
        </div> <!-- end modal body -->
    </div> <!-- end modal content -->
</div>
</div> <!-- container-fluid -->



<!-- Register Modal -->
<div class="modal fade" id="alldaysModal" tabindex="-1" aria-labelledby="exampleModalgridLabel">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalgridLabel">Withdraw Request</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
 
<form action="" method="POST">
<div class="mb-3">
<input type="number" max="150000" min="2000" required name="amount" id="simpleinput" placeholder="Enter Amount (Ugx)" class="form-control">
</div>
<div class="mb-3">
    <label for="example-select" class="form-label">Withdraw Option</label>
    <select class="form-select" name="option" id="example-select" class="choices form-select" name="branch">
        <option value="mobile">Mobile Money </option>
        <option value="bank">Bank/Cheque</option>
    </select>
</div>
<div class="mb-3">
<table class="table">
    <h4>Withdraw Fees</h4>
    <tr>
        <th>RANGE</th>
        <th>FEES</th>
    </tr>
    <tr>
        <td>500 - 60,000</td>
        <td>600</td>
    </tr>
    <tr>
        <td>60,001 - 500,000</td>
        <td>1,200</td>
    </tr>
    <tr>
        <td>500,001 - 1,000,000</td>
        <td>2,000</td>
    </tr>
    <tr>
        <td>1,000,001 - 5,000,000</td>
        <td>2,400</td>
    </tr>
    
</table>
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
    <button name="withdraw" class="btn btn-primary form-control" type="submit">Initiate Withdraw</button>
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





<?php

include "includes/dbhandle.php";
include "core/walletbalance.php";
include "includes/head2.php";
if (isset($_POST['order'])){
 

$memberid   = $_POST['member'];
$member     = str_replace(' ', '', $memberid);
$product    = $_POST['product'];
$stockist   = $_POST['stockist'];
$quantity   = (int)$_POST['qty'];
$qty        = str_replace(' ', '', $quantity);



$sql = "SELECT * FROM referrals WHERE referrer_id = '$member' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$level1 = $row['level1'] ;
$level2 = $row['level2'] ?? null;
$level3 = $row['level3'] ?? null;
$level4 = $row['level4'] ?? null;
$level5 = $row['level5'] ?? null;
$level6 = $row['level6'] ?? null;
$level7 = $row['level7'] ?? null;
$level8 = $row['level8'] ?? null;
$level9 = $row['level9'] ?? null;
$level10 = $row['level10'] ?? null;

$sql    = "SELECT * FROM products WHERE prodID = '$product' ";
$result = mysqli_query($con, $sql);
$rowp    = mysqli_fetch_array($result);
$price  = (int)$rowp['price'];
//echo "Price is ".$price."<br/>";
//echo "Qty is ".$qty;
//var_dump($price);
$total  = $price * $qty;


$sql = "SELECT SUM(amount) AS wtotal FROM deposits WHERE member = '$member' AND status='Complete' ";
        $sql1    = "SELECT SUM(total) as totalOrders FROM orders WHERE member = '$member' ";
            $result = mysqli_query($con, $sql1);
            $row    = mysqli_fetch_array($result);
            $totalOrders  = (int)$row['totalOrders'];
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $currencyBalance = $row['wtotal'] - $totalOrders;

if ($currencyBalance < $total){

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
<svg style="height: 60px; width: 60px; border-width: 2px; border-style: solid; border-radius: 50%; padding: 10px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
</div>

<div class="text-center">
<h3 class="mt-4 fw-semibold text-black text-capitalize">Order Rejected</h3>
<p class="text-muted">You do not have enough balance to place this order. Kindly refill your balance.</p>
</div> 

<a class="btn btn-primary mt-3 me-1" href="products-m.php">Back to Orders</a>
</div></div></div></div></div></div></div></div></div>';
}elseif ($currencyBalance >= $total) {
    //Update Stock Level
    $newQty = $rowp['qty'] - $qty;
    $stmt = $con->prepare("UPDATE products SET qty=? WHERE prodID=?");
    $stmt->bind_param('si', $newQty, $product);
    $stmt->execute();



    try{

//Register order
$stmt   = $con->prepare('INSERT INTO orders (product, qty, total, stockist, member)
    VALUES (?, ?, ?, ?, ?)');
$stmt->bind_param('sssss', $product, $qty, $total, $stockist, $member);
$stmt->execute();

//Giving client 10% commission
$message    = "Purchase of product";
$commission = 0.08 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $member, $message, $commission);
$stmt->execute(); 

//Giving Stockist 15000 commission
$message    = "Purchase of product by ".$member;
$commission = 15000;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $stockist, $message, $commission);
$stmt->execute();

//Giving level1 2.5% commission
if (!empty($level1)) {
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.025 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level1, $message, $commission);
$stmt->execute();
}

//Giving level2 2% commission
if(!empty($level2)) {
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.020 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level2, $message, $commission);
$stmt->execute();
}

//Giving level3 1.5% commission
if(!empty($level3)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.015 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level3, $message, $commission);
$stmt->execute();
}

if(!empty($level4)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.010 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level4, $message, $commission);
$stmt->execute();
} 

if(!empty($level5)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.005 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level5, $message, $commission);
$stmt->execute();
}

if(!empty($level6)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.005 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level6, $message, $commission);
$stmt->execute();

}

if(!empty($level7)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.005 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level7, $message, $commission);
$stmt->execute();

}

if(!empty($level8)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.005 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level8, $message, $commission);
$stmt->execute();
 }

 if(!empty($level9)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.005 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level8, $message, $commission);
$stmt->execute();
 }

 if(!empty($level10)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.005 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level8, $message, $commission);
$stmt->execute();
 }

// Commit the transaction
$con->commit();
header('Location: ordersuccess.php');

} catch (Exception $e) {
    // Rollback the transaction in case of error
    $con->rollback();
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>"."Failed to insert data: " . $e->getMessage();
            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
            </button>
        </div>";

}
}}
?>
<?php
session_start();
include "includes/dbhandle.php";

if (isset($_POST['order'])){


$memberid   = $_POST['member'];
$member     = str_replace(' ', '', $memberid);
$product    = $_POST['product'];
$stockist   = $_POST['stockist'];
$balance    = $_POST['balance'];
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

$sql    = "SELECT * FROM products WHERE prodID = '$product' ";
$result = mysqli_query($con, $sql);
$row    = mysqli_fetch_array($result);
$price  = (int)$row['price'];
echo "Price is ".$price."<br/>";
echo "Qty is ".$qty;
var_dump($price);
$total  = $price * $qty;

try {  
$stmt   = $con->prepare('INSERT INTO orders (product, qty, total, stockist, member)
    VALUES (?, ?, ?, ?, ?)');
$stmt->bind_param('sssss', $product, $qty, $total, $stockist, $member);
$stmt->execute();


if (!empty($level1)) {
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.10 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level1, $message, $commission);
$stmt->execute();

}

if(!empty($level2)) {
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.03 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level2, $message, $commission);
$stmt->execute();

}

if(!empty($level3)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.025 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level3, $message, $commission);
$stmt->execute();

}

if(!empty($level4)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.020 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level4, $message, $commission);
$stmt->execute();

}

if(!empty($level5)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.015 * $total;
$stmt       = $con->prepare('INSERT INTO commissions (member, name, amount)
    VALUES (?, ?, ?)');
$stmt->bind_param('sss', $level5, $message, $commission);
$stmt->execute();

}

if(!empty($level6)) {
    // code...
    // insert into referrals
$message    = "Purchase by ".$_SESSION['id'];
$commission = 0.010 * $total;
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

}
?>
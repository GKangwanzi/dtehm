<!DOCTYPE html>
<html lang="en">
    <head> 

        <meta charset="utf-8" />
        <title>DTEHM Health</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="DTEHM Health Ministries"/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Datatables css -->
        <link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
        <link href="../assets/css/picker.min.css" rel="stylesheet" type="text/css" id="app-style" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
        <!-- Icons -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>


<?php
//Create new beneficiary
include "dbhandle.php";


if ($_GET['action']=='deliver'){

    $order = $_GET['order'];
    $status = 'delivered';

      
    $sql = "UPDATE orders SET status='$status' WHERE orderid='$order'";

    if(mysqli_query($con, $sql)){
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
<h3 class="mt-4 fw-semibold text-black text-capitalize">Delivered</h3>
<p class="text-muted">You have successfully marked this order as delivered. </p>
</div> 

<a class="btn btn-primary mt-3 me-1" href="../orders.php">Back to Orders</a>

</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>';


    }}elseif($_GET['action']=='cancel'){

    $order = $_GET['order'];
    $status = 'cancelled';

     
    $sql = "UPDATE orders SET status='$status' WHERE orderid='$order' ";

    if(mysqli_query($con, $sql)){
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
<h3 class="mt-4 fw-semibold text-black text-capitalize">Cancelled</h3>
<p class="text-muted">You have successfully marked this order as cancelled. </p>
</div> 

<a class="btn btn-primary mt-3 me-1" href="../orders.php">Back to Orders</a>

</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>';

        } else{ 
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."My Profile"."</p>";
    }
    ?>
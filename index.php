<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>DTEHM </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Custom css -->
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

<body class="bg-primary-subtle">
<!-- Begin page -->
<div class="account-page">
<div class="container-fluid p-0">
<div class="row align-items-center g-0">

<div class="col-xl-7 hide-sm">
<div class="account-page-bg p-md-5 p-4">
<div class="text-center">
<div class="auth-image">
<img style="width: 80%;" src="assets/images/12-1.png" class="mx-auto img-fluid"  alt="images">
</div>
</div>
</div>
</div>

<div class="col-xl-5 col-sm-12">
<div class="row">
<div class="col-md-8 mx-auto">
<div class="card p-3 mb-0 login-card">
<div class="card-body">

<div class="mb-0 border-0 p-md-5 p-lg-0 p-0">
<div class="mb-4 p-0 text-center">
<a href="index.html" class="auth-logo">
<img src="assets/images/logo-dark.png" alt="logo-dark" class="mx-auto" height="28" />
</a>
</div>

<div class="auth-title-section mb-3 text-center"> 
<h3 class="text-dark fs-20 fw-medium mb-2">Welcome back</h3>
<p class="text-dark text-capitalize fs-14 mb-0">Sign in to continue.</p>
</div>

<div class="pt-0">
    <?php

if (isset($_POST['login'])) {
    require_once 'includes/dbhandle.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  

    $sql = "SELECT * FROM users WHERE username='$username' ";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {
        if ($password == $user["password"]) {
            session_start();
            $_SESSION['user'] = $user["fname"];

            $lastLogin = (date("Y/m/d h:i:s a"));
            $sql = "UPDATE users SET lastLogin='$lastLogin' WHERE username='$username'";

            if(mysqli_query($con, $sql)){
                header("Location: dash.php"); 
                die();
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                }
         
            // Close connection
            mysqli_close($con);

        }else{
            echo "
            <div class='alert alert-secondary alert-dismissible fade show' role='alert'>
                Password is wrong!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
                </button>
            </div>";
        }
    }else{
        echo "
            <div class='alert alert-secondary alert-dismissible fade show' role='alert'>
                User does not exist!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>  
                </button>
            </div>";
    }
}

?>
<form method="POST" action="" class="my-4">
<div class="form-group mb-3">
<input class="form-control" type="text" name="username" required="" placeholder="Enter username">
</div>

<div class="form-group mb-3">
<input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
</div>

<div class="form-group d-flex mb-3">
<div class="col-sm-6">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
        <label class="form-check-label" for="checkbox-signin">Remember me</label>
    </div>
</div>
<div class="col-sm-6 text-end">
    <a class='text-muted fs-14' href='auth-recoverpw.html'>Forgot password?</a>                             
</div>
</div>

<div class="form-group mb-0 row">
<div class="col-12">
    <div class="d-grid">
        <button name="login" class="btn btn-primary" type="submit"> Log In </button>
    </div>
</div>
</div>
</form>

</div>
</div>

</div>
</div>

</div>
</div>
</div>



</div>
</div>
</div>

<!-- END wrapper -->

<!-- Vendor -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>

<!-- App js-->
<script src="assets/js/app.js"></script>

</body>
</html>
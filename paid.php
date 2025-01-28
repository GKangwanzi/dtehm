<?php

    include "includes/dbhandle.php";
    $member = $_GET['id'];
    $status = "paid";
 
     
    $sql = "UPDATE members SET membership='$status' WHERE memberID='$member'";
 
    if(mysqli_query($con, $sql)){
        ?>
        <script type="text/javascript"> 
        alert("Membership successfully paid"); 
        window.history.go(-1);

        </script>
<?php
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    ?>
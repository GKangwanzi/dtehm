<?php      
    $host = "localhost";  
    $user = "dtehmhea_appadmin";  
    $passw = "w0ejk3NM)n0j";  
    $dbname = "dtehmhea_app";  
      
    $con = mysqli_connect($host, $user, $passw, $dbname);  
    if( mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>   
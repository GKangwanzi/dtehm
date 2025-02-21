<?php include "core/insert.php" ?>
<?php include "includes/dbhandle.php" ?>
<?php include "includes/con.php" ?>
<?php include "includes/head.php" ?>

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

</div>
</div>

<div class="row">
    <div class="col-4">
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE prodID = '$id' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    ?>
        <img class="card-img-top rounded-top" src="photos/<?php echo $row['photo'];?>" alt="Card image cap">
    </div>
    <div class="col-8">
        <h2 class="card-title"><?php echo $row['name']; ?></h2>
        <p class='card-text text-muted'><?php echo substr_replace($row['description'],"...", 200); ?></p>
        <form action="order.php" method="POST" class="row row-cols-lg-auto g-3 ">
        <div class="row" style="margin-top: 10px; margin-bottom: 10px;">

        <div style="margin-top: 5px;" class="col-12">
        <input class="form-control" hidden name="member" placeholder="Quantity" type="text" value="
        <?php 
        echo $_SESSION['id'];
        ?> 
        ">
        </div>
        <div style="margin-top: 5px;" class="col-12">
        <input class="form-control" hidden name="product" placeholder="Quantity" type="text" value="
        <?php 
        echo $_GET['id'];
        ?>
        ">
        </div>

        <div class="col-12" style="margin-top: 5px;">
            <select required class="form-select" name="stockist" id="example-select" class="choices form-select" >
            <option value="">Select Pickup Center</option>
            <?php 
            $sql = "SELECT * FROM users WHERE role='stockist' ";
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                            echo '<option value='.$row['memberID'].'>' 
                            . $row['fname'].' '.$row['lname'].'</option>';
                    }
                    mysqli_free_result($result);
                } else{
                    echo "No records found.";
                }}
            ?> 
            </select>
        </div>
      

        <div style="margin-top: 5px;" class="col-12">
                <input required class="form-control" name="qty" placeholder="Quantity" type="number" >

        </div>
        <div class="col-12" style="margin-top: 10px;">
            <button type="submit" name="order" class="btn btn-primary">ORDER NOW</button>
        </div>
        </div>

    </form>
    </div>
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
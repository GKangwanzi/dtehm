
<div class="card">
<div class="card-body">
    <?php 
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE memberID='$id' ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        ?>
    <div class="card-header">
    <h5 class="card-title mb-0"><?php echo $row['memberID']; ?></h5>
    </div><!-- end card header -->
<div class="card-body">
<div class="row">
<form enctype="multipart/form-data" method="POST">
<div class="mb-3">
    <label for="example-email" class="form-label">Account Name</label>
    <input type="text" name="bankaccntName" placeholder="Enter Account Name"   class="form-control">
</div>
<div class="mb-3">
    <label for="example-email" class="form-label">Account Number</label>
    <input type="text" name="bankaccount" placeholder="Enter Account Number"   class="form-control">
</div>
<div class="mb-3">
    <label for="example-email" class="form-label">Bank Name</label>
    <input type="text" name="bankname" placeholder="Enter Bank Name"   class="form-control">
</div>

<div class="mb-3">
    <label for="example-select" class="form-label"></label>
    <button class="btn btn-primary form-control" name="post" type="submit">Save Number</button>
</div>
</form>
</div>
</div>
</div>
</div>

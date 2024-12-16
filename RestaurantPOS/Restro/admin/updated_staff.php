<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');


//Add Customer
if (isset($_POST['updateStaff1'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["sdtnv"]) || empty($_POST["pass"]) || empty($_POST['dcnv']) || empty($_POST['tt'])|| empty($_POST['username'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $username = ($_POST['username']); 
    $pass = $_POST['pass'];
    $tt = ($_POST['tt']);
    $sdtnv = $_POST['sdtnv'];
    $dcnv = $_POST['dcnv']; 
    $update = $_GET['update'];

    //Insert Captured information to a database table
    $sql_sua = "UPDATE tbl_admin SET username = '$username', password='$pass', dichi='$dcnv', sdt='$sdtnv', admin_status='$tt' WHERE id_admin = '$update'";
	$postStmt=mysqli_query($mysqli,$sql_sua);
    
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Sửa thông tin thành công" && header("refresh:1; url=staff.php");
    } else {
      $err = "Please Try Again Or Try Later";      
    }
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    $update = $_GET['update'];
    $ret = "SELECT * FROM  tbl_admin WHERE id_admin = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($cust = $res->fetch_object()) {
    ?>
      <!-- Header -->
      <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
        <div class="container-fluid">
          <div class="header-body">
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
          <div class="col">
            <div class="card shadow">
              <div class="card-header border-0">
                <h3>Please Fill All Fields</h3>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Username: </label>
                      <input type="text" name="username" value="<?php echo $cust->username; ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Password</label>
                      <input type="password" name="pass" value="<?php echo $cust->password; ?>" class="form-control" value="">
                    </div>
                  </div>
                  <hr>
                  <div class="form-row">
                    <div class="col-md-6">
                     <label>Số điện thoại: </label>
                     <input type="text" name="sdtnv" value="<?php echo $cust->sdt; ?>" class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                     <label>Địa chỉ: </label>
                     <input type="text" name="dcnv" value="<?php echo $cust->dichi; ?>" class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                     <label>Trạng thái: </label>
                     <input type="text" name="tt" value="<?php echo $cust->admin_status;?>" class="form-control" value="">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="updateStaff1" value="Update Staff" class="btn btn-success" value="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
    }
      ?>
      </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>
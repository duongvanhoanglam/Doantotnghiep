<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

//Udpate Staff
if (isset($_POST['Updateloaisp'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["tenloai"]) ) {
    $err = "Blank Values Not Accepted";
  } else {
    $tenloai = $_POST['tenloai'];
    $update = $_GET['update'];

    $sql_update = "UPDATE tbl_loaisp SET tenloaisp='".$tenloai."' WHERE id_loaisp='$update'";
	$postStmt=mysqli_query($mysqli,$sql_update);
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Loại sản phẩm Updated" && header("refresh:1; url=loaisp.php");
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
    $ret = "SELECT * FROM  tbl_loaisp WHERE id_loaisp = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($loaisp = $res->fetch_object()) {
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
                      <label>Tên loại</label>
                      <input type="text" name="tenloai" class="form-control" value="<?php echo $loaisp->tenloaisp; ?>">
                    </div>                    
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="Updateloaisp" value="Update Loại sản phẩm" class="btn btn-success" value="">
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
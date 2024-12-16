<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

//Udpate Staff
if (isset($_POST['Updatedmbv'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["tendanhmucbv"])) {
    $err = "Blank Values Not Accepted";
  } else {
    $tendanhmuc = $_POST['tendanhmucbv'];
    $update = $_GET['update'];

    $sql_update = "UPDATE tbl_danhmucbv SET tendanhmuc_bv='".$tendanhmuc."' WHERE id_danhmuc='$update'";
	$postStmt=mysqli_query($mysqli,$sql_update);
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Danh mục sản phẩm Updated" && header("refresh:1; url=danhmucbv.php");
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
    $ret = "SELECT * FROM tbl_danhmucbv WHERE id_danhmuc='$update' LIMIT 1";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($dmsp = $res->fetch_object()) {
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
                      <label>Tên danh mục</label>
                      <input type="text" name="tendanhmucbv" class="form-control" value="<?php echo $dmsp->tendanhmuc_bv; ?>">
                    </div>                 
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="Updatedmbv" value="Update Danh mục bài viết" class="btn btn-success" value="">
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
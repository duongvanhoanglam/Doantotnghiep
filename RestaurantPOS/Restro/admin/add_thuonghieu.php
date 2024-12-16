<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');


if (isset($_POST['addThuonghieu'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["tenthuonghieu"]) ) {
    $err = "Blank Values Not Accepted";
  } else {
    $tenthuonghieu = $_POST['tenthuonghieu'];
    $hinhanhbrand = $_FILES['hinhanhbrand']['name'];
    $hinhanhbrand = time().'_'.$hinhanhbrand;
    $prod_img = $_FILES['hinhanhbrand']['tmp_name'];
	$sql_them = "INSERT INTO tbl_brand(tenbrand,hinhanhbrand) VALUE('".$tenthuonghieu."','".$hinhanhbrand."')";
	$postStmt=mysqli_query($mysqli,$sql_them);
	move_uploaded_file($prod_img,'assets/img/thuonghieu/'.$hinhanhbrand);
    if ($postStmt) {
      $success = "Thêm thương hiệu thành công" && header("refresh:1; url=thuonghieu.php");
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
    ?>
    <!-- Header --><!-- For more projects: Visit codeastro.com  -->
    <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div><!-- For more projects: Visit codeastro.com  -->
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3>Please Fill All Fields</h3>
            </div><!-- For more projects: Visit codeastro.com  -->
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Tên thương hiệu</label>
                    <input type="text" name="tenthuonghieu" class="form-control">
                    <input type="hidden" name="masp" value="<?php echo $masp; ?>" class="form-control">
                  </div>                                    
                </div>
                <hr><!-- For more projects: Visit codeastro.com  -->
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Hình ảnh sản phẩm</label>
                    <input type="file" name="hinhanhbrand" class="btn btn-outline-success form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addThuonghieu" value="Add Thương hiệu" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- For more projects: Visit codeastro.com  -->
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>
<!-- For more projects: Visit codeastro.com  -->
</html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');
//Visit codeastro.com for more projects
//Add Customer
if (isset($_POST['addCustomer'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["tendanhmuc"]) || empty($_POST["loaisp"])) {
    $err = "Blank Values Not Accepted";
  } else {
    $tendanhmuc = $_POST['tendanhmuc'];
    $loaisp = $_POST['loaisp'];

    $sql_them = "INSERT INTO tbl_danhmucsp(tendanhmuc,id_loaisp) VALUES('".$tendanhmuc."','".$loaisp."')";
	$postStmt=mysqli_query($mysqli,$sql_them);
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Danh mục sản phẩm Added" && header("refresh:1; url=danhmucsp.php");
    } else {
      $err = "Please Try Again Or Try Later";
    }
  }
}
//Visit codeastro.com for more projects
require_once('partials/_head.php');
?>

<body>
<!-- For more projects: Visit codeastro.com  -->
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
            </div><!-- For more projects: Visit codeastro.com  -->
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Tên danh mục sản phẩm</label>
                    <input type="text" name="tendanhmuc" class="form-control">
                    <input type="hidden" name="id_danhmuc" value="<?php echo $cus_id; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Loại sản phẩm</label>
                    <select class="form-control" name="loaisp" id="custName" onChange="getCustomer(this.value)">
                      <option value="">Chọn loại sản phẩm</option>
                      <?php
                        $sql_loaisp = "SELECT * FROM tbl_loaisp ORDER BY id_loaisp DESC";
                        $query_loaisp = mysqli_query($mysqli,$sql_loaisp);
                        while($row_loaisp = mysqli_fetch_array($query_loaisp)){
                        ?>
                        <option value="<?php echo $row_loaisp['id_loaisp'] ?>"><?php echo $row_loaisp['tenloaisp'] ?></option>
                        <?php
                        } 
                        ?>
                    </select>
		              </div>
                </div>    
                <br><!-- For more projects: Visit codeastro.com  -->
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addCustomer" value="Add Product" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer --><!-- For more projects: Visit codeastro.com  -->
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

</html>
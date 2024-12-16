</html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');


if (isset($_POST['addbaiviet'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["tenbaiviet"]) || empty($_POST["tomtat"]) || empty($_POST["noidung"])) {
      $err = "Blank Values Not Accepted";
    } else {
    $tenbaiviet = $_POST['tenbaiviet'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $loaibv = $_POST['loaibv'];
    $tinhtrang = $_POST['tinhtrang'];
    $hinhanhbv = $_FILES['hinhanhbv']['name'];
    $hinhanhbv = time().'_'.$hinhanhbv;
    $prod_img = $_FILES['hinhanhbv']['tmp_name'];
	$sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,id_danhmuc,hinhanh,tinhtrang,tomtat,noidung) VALUES ('$tenbaiviet','$loaibv','$hinhanhbv','$tinhtrang','$tomtat','$noidung')";
	$postStmt=mysqli_query($mysqli,$sql_them);
	move_uploaded_file($prod_img,'assets/img/anhbaiviet/'.$hinhanhbv);
    if ($postStmt) {
      $success = "Thêm bài viết thành công" && header("refresh:1; url=baiviet.php");
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
                    <label>Tên bài viết</label>
                    <input type="text" name="tenbaiviet" class="form-control">
                    <input type="hidden" name="id_baiviet" value="<?php echo $cus_id; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Danh mục bài viết</label>
                    <select class="form-control" name="loaibv" id="custName" onChange="getCustomer(this.value)">
                      <option value="">Chọn danh mục</option>
                      <?php
	    		       $sql_brand = "SELECT * FROM tbl_danhmucbv ORDER BY id_danhmuc DESC";
	    		       $query_brand = mysqli_query($mysqli,$sql_brand);
	    		       while($row_brand = mysqli_fetch_array($query_brand)){
	    		       ?>
	    		        <option value="<?php echo $row_brand['id_danhmuc'] ?>"><?php echo $row_brand['tendanhmuc_bv'] ?></option>
	    		       <?php
	    		       } 
	    		       ?>
                    </select>
		            </div>
                    <div class="col-md-6">
                    <label>Tình trạng</label>
                    <select class="form-control" name="tinhtrang" id="custName" onChange="getCustomer(this.value)">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Ẩn</option>
                      </select>
                  </div>                  
                </div>
                <hr><!-- For more projects: Visit codeastro.com  -->
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Hình ảnh sản phẩm</label>
                    <input type="file" name="hinhanhbv" class="btn btn-outline-success form-control" value="">
                  </div>
                </div>
                <hr><!-- For more projects: Visit codeastro.com  -->
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Tóm tắt</label>
                    <textarea rows="3" name="tomtat" class="form-control" value=""></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Nội dung</label>
                    <textarea rows="5" name="noidung" class="form-control" value=""></textarea>
                  </div>
                </div>    
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addbaiviet" value="Add bài viết" class="btn btn-success" value="">
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
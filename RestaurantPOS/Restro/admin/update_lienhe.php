<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

if (isset($_POST['Updateth'])) {
  //Prevent Posting Blank Values
    $hinhanhbanner = $_FILES['hinhanhbanner']['name'];
    $hinhanhbanner = time().'_'.$hinhanhbanner;
    $prod_img = $_FILES['hinhanhbanner']['tmp_name'];

    $update = $_GET['update'];

    if(!empty($_FILES['hinhanhbanner']['name'])){

		move_uploaded_file($prod_img,'assets/img/anhbanner/'.$hinhanhbanner);
		
		$sql_update = "UPDATE tbl_banner SET anh_banner='".$hinhanhbanner."' WHERE id_banner ='$update'";

		//xoa hinh anh cu
		$sql = "SELECT * FROM tbl_banner WHERE id_banner = '$update' LIMIT 1";
		$query = mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('assets/img/anhbanner/'.$row['anh_banner']);
		}
		
	}else{
		$sql_update = "UPDATE tbl_banner SET thutu='".$thutu."' WHERE id_banner ='$update]'";
	}
    $kq=mysqli_query($mysqli,$sql_update);
    if ($kq) {
      $success = "Sửa thành công" && header("refresh:1; url=banner.php");
    } else {
    }
}
/*<a href="products.php?deleteap=<?phpcust echo $row_picture2['id'] ?>&idsanpham=<?php echo $row['id_sanpham'] ?>&ptc=<?php echo $row_picture2['img_product'] ?>" class="btn_xoa">Xóa</a>*/
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
    $ret = "SELECT * FROM tbl_banner WHERE id_banner = '$update'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($bv = $res->fetch_object()) {
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
                <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                      <label>Product Image</label>
                      <input type="file" name="hinhanhbanner" class="btn btn-outline-success form-control" value="<?php echo $anh_banner; ?>">
                      
                      <?php
                          echo "<img src='assets/img/anhbanner/$bv->anh_banner' height='60' width='60 class='img-thumbnail'>";
                        ?>
                    </div>
                </div>                
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="Updateth" value="Update Thương hiệu" class="btn btn-success" value="">
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

</html>
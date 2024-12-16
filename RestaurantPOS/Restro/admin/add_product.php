<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');


if (isset($_POST['addProduct'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["masp"]) || empty($_POST["tensanpham"]) || empty($_POST['soluong']) || empty($_POST['giasp']) || empty($_POST['sanxuat']) || empty($_POST['tomtat']) || empty($_POST['noidung']) || empty($_POST['danhmuc'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $tensanpham = $_POST['tensanpham'];
    $sale = $_POST['sale'];
    $masp  = $_POST['masp'];
    $soluong = $_POST['soluong'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh = time().'_'.$hinhanh;
    $prod_img = $_FILES['hinhanh']['tmp_name'];
    $sanxuat = $_POST['sanxuat'];
    $giasp = $_POST['giasp'];
    $thuonghieu = $_POST['brand'];
    $danhmuc = $_POST['danhmuc'];
    $tinhtrang = $_POST['tinhtrang'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $thongso = $_POST['danhmuc'];
    $files = $_FILES['images'];
    $files_names= $files['name'];
	  $sql_them = "INSERT INTO tbl_sanpham (tensanpham,masp,giasp,soluong,sanxuat,id_brand,id_danhmuc,noidung,tomtat,thongso,hinhanh,tinhtrang,sale) VALUES ('$tensanpham','$masp','$giasp','$soluong','$sanxuat','$thuonghieu','$danhmuc','$noidung','$tomtat','$thongso','$hinhanh','$tinhtrang','$sale')";
    
    move_uploaded_file($prod_img,'assets/img/products/'.$hinhanh);
    $postStmt=mysqli_query($mysqli,$sql_them);
    foreach($files_names as $key => $value){
       
      move_uploaded_file($files['tmp_name'][$key],'assets/img/products2/'.$value);
    }
    $id_pro = mysqli_insert_id($mysqli);
    foreach($files_names as $key => $value){
      
      $sql_them2 = "INSERT INTO img_product(id_product,img_product) VALUES ('$id_pro','$value')";
      mysqli_query($mysqli,$sql_them2);
    
    }
    if ($postStmt) {
      $success = "Thêm sản phẩm thành công" && header("refresh:1; url=products.php");
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
                    <label>Tên Sản phẩm</label>
                    <input type="text" name="tensanpham" class="form-control">
                    <input type="hidden" name="masp" value="<?php echo $masp; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Mã Sản phẩm</label>
                    <input type="text" name="masp" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control" value="" readonly>
                  </div>
                  <div class="col-md-6">
                    <label>Số Lượng</label>
                    <input type="number" name="soluong" class="form-control" value="" min=1>
                  </div>
                  <div class="col-md-6">
                    <label>Nơi Sản Xuất</label>
                    <input type="text" name="sanxuat" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="giasp" class="form-control" value="" min=1000>
                  </div>
                  <div class="col-md-6">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="brand" id="custName" onChange="getCustomer(this.value)">
                      <option value="">Chọn thương hiệu</option>
                      <?php
                        $sql_brand = "SELECT * FROM tbl_brand ORDER BY id_brand DESC";
                        $query_brand = mysqli_query($mysqli,$sql_brand);
                        while($row_brand = mysqli_fetch_array($query_brand)){
                        ?>
                        <option value="<?php echo $row_brand['id_brand'] ?>"><?php echo $row_brand['tenbrand'] ?></option>
                        <?php
                        } 
                        ?>
                    </select>
		              </div>
                  <div class="col-md-6">
                    <label>Danh mục sản phẩm</label>                    
                      <select class="form-control" name="danhmuc" id="custName" onChange="getCustomer(this.value)">
                        <option value="">Chọn danh mục sản phẩm</option>
                        <?php
                          $sql_danhmucsp = "SELECT * FROM tbl_danhmucsp ORDER BY id_danhmuc DESC";
                          $query_danhmucsp = mysqli_query($mysqli,$sql_danhmucsp);
                          while($row_danhmucsp = mysqli_fetch_array($query_danhmucsp)){
                          ?>
                          <option value="<?php echo $row_danhmucsp['id_danhmuc'] ?>"><?php echo $row_danhmucsp['tendanhmuc'] ?></option>
                          <?php
                          } 
                          ?>
                      </select>
		              </div>
                  <div class="col-md-6">
                    <label>Sale</label>
                    <input type="text" name="sale" class="form-control" value="">
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
                    <input type="file" name="hinhanh" class="btn btn-outline-success form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Hình ảnh phụ của sản phẩm</label>
                    <input type="file" name="images[]" class="btn btn-outline-success form-control" value="">
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
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Thống só kỹ thuật</label><br>
                    <i><strong>Note: Khi thêm thông số kĩ thuật , chọn dạng bảng (table) với độ rộng = 100%</strong></i>
                    <textarea rows="5" name="thongso" class="form-control" value=""></textarea>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addProduct" value="Add Product" class="btn btn-success" value="">
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
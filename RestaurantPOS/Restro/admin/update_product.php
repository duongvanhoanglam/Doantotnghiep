<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

if (isset($_POST['UpdateProduct'])) {
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
    $brand = $_POST['brand'];
    $danhmuc = $_POST['danhmuc'];
    $tinhtrang = $_POST['tinhtrang'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $thongso = $_POST['danhmuc'];
    $files = $_FILES['images'];
    $files_names= $files['name'];
    $update = $_GET['update'];

    if(!empty($_FILES['hinhanh']['name']) ){
      move_uploaded_file($prod_img,'assets/img/products/'.$hinhanh);
      
      $sql_update = "UPDATE tbl_sanpham SET tensanpham = '$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', sanxuat='$sanxuat', tomtat='$tomtat', noidung='$noidung', thongso='$thongso', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc', id_brand='$brand', hinhanh='$hinhanh', sale='$sale' WHERE id_sanpham = '$update'";
      //xoa hinh anh cu
      $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $update LIMIT 1";
      $query = mysqli_query($mysqli,$sql);
      while($row = mysqli_fetch_array($query)){
        unlink('assets/img/products/'.$row['hinhanh']);
        
      }
  
    }
    
    else{
      $sql_update = "UPDATE tbl_sanpham SET tensanpham = '$tensanpham', masp='$masp', giasp='$giasp', soluong='$soluong', sanxuat='$sanxuat', tomtat='$tomtat', noidung='$noidung', thongso='$thongso', tinhtrang='$tinhtrang', id_danhmuc='$danhmuc', id_brand='$brand', sale='$sale' WHERE id_sanpham = '$update'";
    }
        
    foreach($files_names as $key => $value){
        if(!empty($files['name'][$key])){
          move_uploaded_file($files['tmp_name'][$key],'assets/img/products2/'.$value);
          $sql_them2 = "INSERT INTO img_product(id_product,img_product) VALUES ('$update','$value')";
          $kq=mysqli_query($mysqli,$sql_them2);
        }
      
      
    }
    $kq=mysqli_query($mysqli,$sql_update);
    if ($kq) {
      $success = "Sửa thành công" && header("refresh:1; url=products.php");
    } else {
    }
  }
// Kiểm tra xem nút xóa có được nhấp vào hay không
if (isset($_POST['delete'])) {
  // Xóa hình ảnh khỏi cơ sở dữ liệu
  $idpro = $_POST['idpro'];
  $ptc = $_POST['ptc'];
  $sql_xoa2 = "DELETE FROM img_product WHERE id='".$idpro."'";
    $stmt3=mysqli_query($mysqli,$sql_xoa2);
     unlink('modules/quanlisanpham/upload2/'.$ptc);
  if ($stmt3) {
    $success = "Deleted" && header("refresh:1; url=products.php");
  }else {
    $err = "Try Again Later";
  }
}
}
/*<a href="products.php?deleteap=<?php echo $row_picture2['id'] ?>&idsanpham=<?php echo $row['id_sanpham'] ?>&ptc=<?php echo $row_picture2['img_product'] ?>" class="btn_xoa">Xóa</a>*/
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
    $ret = "SELECT * FROM  tbl_sanpham WHERE id_sanpham = '$update' ";
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
                <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Tên Sản phẩm</label>
                    <input type="text" name="tensanpham" value="<?php echo $cust->tensanpham; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Mã Sản phẩm</label>
                    <input type="text" name="masp" value="<?php echo $cust->masp; ?>" class="form-control" value="" readonly>
                  </div>
                  <div class="col-md-6">
                    <label>Số Lượng</label>
                    <input type="number" name="soluong" value="<?php echo $cust->soluong; ?>" class="form-control" value="" min=1>
                  </div>
                  <div class="col-md-6">
                    <label>Nơi Sản Xuất</label>
                    <input type="text" name="sanxuat" value="<?php echo $cust->sanxuat; ?>" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="giasp" value="<?php echo $cust->giasp; ?>" class="form-control" value="" min=1000>
                  </div>
                  <div class="col-md-6">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="brand" id="custName" onChange="getCustomer(this.value)">
                    <?php
                      $sql_brand = "SELECT * FROM tbl_brand ORDER BY id_brand DESC";
                      $query_brand = mysqli_query($mysqli,$sql_brand);
                      while($row_brand = mysqli_fetch_array($query_brand)){
                                if($row_brand['id_brand'] == $row['id_brand']){
                                    echo "<option value='$row_brand[id_brand]' selected>$row_brand[tenbrand]</option>";
                                }
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
                      <?php
                        $sql_danhmucsp = "SELECT * FROM tbl_danhmucsp ORDER BY id_danhmuc DESC";
                        $query_danhmucsp = mysqli_query($mysqli,$sql_danhmucsp);
                        while($row_danhmucsp = mysqli_fetch_array($query_danhmucsp)){
                                  if($row_danhmucsp['id_danhmuc'] == $row['id_danhmuc']){
                                      echo "<option value='$row_danhmucsp[id_danhmuc]' selected>$row_danhmucsp[tendanhmuc]</option>";
                                  }
                        ?>
                        <option value="<?php echo $row_danhmucsp['id_danhmuc'] ?>"><?php echo $row_danhmucsp['tendanhmuc'] ?></option>
                        <?php
                        } 
                        ?>
                      </select>
		              </div>
                  <div class="col-md-6">
                    <label>Sale</label>
                    <input type="text" name="sale" value="<?php echo $cust->sale; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Tình trạng</label>
                    <select class="form-control" name="tinhtrang" id="custName" onChange="getCustomer(this.value)">
                      <?php
                      if($row['tinhtrang']==1){ 
                      ?>
                      <option value="1" selected>Kích hoạt</option>
                      <option value="0">Ẩn</option>
                      <?php
                      }else{ 
                      ?>
                      <option value="1">Kích hoạt</option>
                      <option value="0" selected>Ẩn</option>
                      <?php
                      } 
                      ?>
                    </select>
                  </div>
                </div>
                <hr><!-- For more projects: Visit codeastro.com  -->
                <div class="form-row">
                  <div class="col-md-6">
                      <label>Product Image</label>
                      <input type="file" name="hinhanh" class="btn btn-outline-success form-control" value="<?php echo $hinhanh; ?>">
                      
                      <?php
                          echo "<img src='assets/img/products/$cust->hinhanh' height='60' width='60 class='img-thumbnail'>";
                          echo "assets/img/products/$cust->hinhanh";
                        ?>
                    </div>
                  <div class="col-md-6">
                    <label>Hình ảnh phụ của sản phẩm</label>
                    <input type="file" name="images[]" class="btn btn-outline-success form-control" value="" multiple="multiple">
                      <?php
                          $mysqli = new mysqli("localhost", "root", "206394832", "shop");
                          
                          // Lấy ID của sản phẩm cần cập nhật
                          $update = $_GET['update'];                        
                                                

                          $sql_picture2 = "SELECT * FROM img_product WHERE id_product=$update";
                          $query_picture2 = mysqli_query($mysqli,$sql_picture2);
                                     
                          while($row_picture2 = mysqli_fetch_array($query_picture2)){
                          
                            $imageId = $row_picture2['id'];
                            $imagePath = $row_picture2['img_product'];
                            $productId = $row_picture2['id_product'];
                            echo '<img src="assets/img/products2/' . $imagePath . '" alt="" height="60" width="60" class="img-thumbnail">';
                            echo '<input type="submit" name="delete" value="Delete" class="btn btn-danger" value="">';
                            echo '<input type="hidden" name="id" value="' . $imageId . '">';
                            echo '<input type="hidden" name="idpro" value="' . $productId . '">';
                            echo '<input type="hidden" name="ptc" value="' . $imagePath . '">';
                            // Kết nối với cơ sở dữ liệu
                            
                            if (isset($_POST['delete'])) {
                              // Lấy ID của hình ảnh cần xóa
                              $imageId = $_POST['id'];
                              $productId = $_POST['idpro'];
                              $imagePath = $_POST['ptc'];

                              // Xóa hình ảnh khỏi cơ sở dữ liệu
                              $sql_xoa = "DELETE FROM img_product WHERE id = '$imageId' and id_product='$productId'";
                              $mysqli->query($sql_xoa);
                              $sql_picture2 = "SELECT img_product FROM img_product WHERE id = '$imageId' and id_product='$productId'";
                              $query_picture2 = mysqli_query($mysqli, $sql_picture2);
                              $row_picture2 = mysqli_fetch_array($query_picture2);
                              $imagePath1 = $row_picture2['img_product'];

                              // Unlink tệp hình ảnh khỏi hệ thống tệp
                              unlink('assets/img/products2/' . $imagePath1);
                              echo "<script>window.location.href = 'update_product.php?update=" . $update . "';</script>";
                          
                            }

                        
                      ?>
                           
                      
                      <?php
                      }
                    
                    ?>
                  </div>
                </div>
                <hr><!-- For more projects: Visit codeastro.com  -->
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Tóm tắt</label>
                    <textarea rows="3" name="tomtat" class="form-control" ><?php echo $cust->tomtat; ?></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Nội dung</label>
                    <textarea rows="5" name="noidung"  class="form-control" ><?php echo $cust->noidung; ?></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Thống só kỹ thuật</label><br>
                    <i><strong>Note: Khi thêm thông số kĩ thuật , chọn dạng bảng (table) với độ rộng = 100%</strong></i>
                    <textarea rows="5" name="thongso"  class="form-control" ><?php echo $cust->thongso; ?></textarea>
                  </div>
                </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateProduct" value="Update Product" class="btn btn-success" value="">
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
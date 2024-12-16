<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

if (isset($_POST['Updatebv'])) {
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
    $update = $_GET['update'];

    if(!empty($_FILES['hinhanhbv']['name']) ){              
       
        move_uploaded_file($prod_img,'assets/img/anhbaiviet/'.$hinhanhbv);

        $sql_sua = "UPDATE tbl_baiviet SET tenbaiviet = '$tenbaiviet',id_danhmuc = '$loaibv',hinhanh = '$hinhanhbv',tinhtrang = '$tinhtrang',tomtat = '$tomtat',noidung = '$noidung' WHERE id = '$update'";

        $sql_xoa = "SELECT * FROM tbl_baiviet WHERE id = '$update' LIMIT 1";
        $query_xoa = mysqli_query($mysqli,$sql_xoa);
        while($row = mysqli_fetch_array($query_xoa)){
           unlink('assets/img/anhbaiviet/'.$row['hinhanh']);
        }

        
    }else{
        $sql_sua = "UPDATE tbl_baiviet SET tenbaiviet = '$tenbaiviet',id_danhmuc = '$loaibv',tinhtrang = '$tinhtrang',tomtat = '$tomtat',noidung = '$noidung' WHERE id = '$update'";
    } 

    $kq=mysqli_query($mysqli,$sql_sua);
    if ($kq) {
      $success = "Sửa thành công" && header("refresh:1; url=baiviet.php");
    } else {
    }
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
    $ret = "SELECT * FROM tbl_baiviet WHERE id='$update' LIMIT 1";
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
                    <label>Tên bài viết</label>
                    <input type="text" name="tenbaiviet" value="<?php echo $bv->tenbaiviet; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Thời gian đăng</label>
                    <input type="text" name="masp" value="<?php echo $bv->time; ?>" class="form-control" value="" readonly>
                  </div>                  
                  <div class="col-md-6">
                    <label>Danh mục bài viết</label>
                    <select class="form-control" name="loaibv" id="custName" onChange="getCustomer(this.value)">
                    <?php
	    		      $sql_brand = "SELECT * FROM tbl_danhmucbv ORDER BY id_danhmuc DESC";
	    		      $query_brand = mysqli_query($mysqli,$sql_brand);
	    		      while($row_brand = mysqli_fetch_array($query_brand)){
                          if($row['id_danhmuc '] ==$row_brand['id_danhmuc'] ){
                              echo "<option value='$row_brand[id_danhmuc]' selected>$row_brand[tendanhmuc_bv]</option>";
                          }
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
                      <input type="file" name="hinhanhbv" class="btn btn-outline-success form-control" value="<?php echo $hinhanh; ?>">
                      
                      <?php
                          echo "<img src='assets/img/anhbaiviet/$bv->hinhanh' height='60' width='60 class='img-thumbnail'>";
                        ?>
                    </div>
                </div>
                <hr><!-- For more projects: Visit codeastro.com  -->
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Tóm tắt</label>
                    <textarea rows="3" name="tomtat" class="form-control" ><?php echo $bv->tomtat; ?></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Nội dung</label>
                    <textarea rows="5" name="noidung"  class="form-control" ><?php echo $bv->noidung; ?></textarea>
                  </div>
                </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="Updatebv" value="Update Bài viết" class="btn btn-success" value="">
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
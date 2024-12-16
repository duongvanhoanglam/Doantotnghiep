<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

if (isset($_POST['tlcm'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["noidungtl"]) ) {
    $err = "Blank Values Not Accepted";
  } else {
    $noidungcmt = $_POST['noidungtl'];
    $id_comment = $_GET['update'];
    $id_comment2 = $_GET['id_comment2'];


    $sql_them = "INSERT INTO shop_cmt(id_comment_user,noidung) VALUE('".$id_comment2."','".$noidungcmt."')";
    $stmt1=mysqli_query($mysqli,$sql_them);  
        
    $sql_up = "UPDATE tbl_comments SET tinhtrang = 1 WHERE id_comment = '$id_comment2'";
    $stmt=mysqli_query($mysqli,$sql_up);

    $ems = "Đã Gửi comment cho khách hàng !!!";
    if ($stmt AND $stmt1) {
        $success = "Đã Gửi comment cho khách hàng !!!" && header("refresh:1; url=comments.php");
    } else {
        $err = "Try Again Later";
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
    $id_comment= $_GET['update'];
    $id_comment2 = $_GET['id_comment2'];
    echo $id_comment;
    echo $id_comment2;
    $ret = "SELECT `id_comment`, `id_user`, `id_sp`, `noidungcmt`, `time_cmt`, `tinhtrang` FROM `tbl_comments` WHERE id_sp='$id_comment' AND id_comment='$id_comment2'";
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
                    <label>Nội dung comment</label>
                    <input type="text" name="noidung" value="<?php echo $bv->noidungcmt;  ?>"class="form-control"disabled>
                  </div>
                  <div class="col-md-6">
                    <label>Ngay comment</label>
                    <input type="text" name="date" value="<?php echo $bv->time_cmt;  ?>" class="form-control" disabled>
                  </div>
                  <div class="col-md-6">
                    <label>Nội dung trả lời</label>
                    <input type="text" name="noidungtl" class="form-control">
                  </div>
                </div>        
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="tlcm" value="Trả lời comment" class="btn btn-success" value="">
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
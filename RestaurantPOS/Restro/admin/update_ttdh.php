<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

//Udpate Staff
if (isset($_POST['UpdateDh'])) {
  //Prevent Posting Blank Values
    $fullname = $_POST['fullname'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $cart_date = $_POST['cart_date'];
    $tinhtrang = $_POST['tinhtrang'];
    $update = $_GET['code'];

    $sql_update ="UPDATE tbl_cart SET cart_status='".$tinhtrang."' WHERE code_cart='".$update."'";
    $query = mysqli_query($mysqli,$sql_update);

    header("refresh:1; url=orders.php");

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
    $update = $_GET['code'];
    $ret = "SELECT * FROM tbl_cart,tbl_user WHERE tbl_cart.id_khachhang=tbl_user.id_user AND code_cart='".$update."' ORDER BY tbl_cart.id_cart";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($staff = $res->fetch_object()) {
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
                      <label>Mã đơn hàng</label>
                      <input type="text" name="code_cart" class="form-control" value="<?php echo $staff->code_cart; ?>" disabled>
                    </div>
                    <div class="col-md-6">
                      <label>Tên khách hàng</label>
                      <input type="text" name="fullname" class="form-control" value="<?php echo $staff->fullname; ?>"disabled>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <label>Địa chỉ</label>
                      <input type="text" name="diachi" class="form-control" value="<?php echo $staff->diachicuthe.",".$staff->tinh.",".$staff->tp; ?>"disabled>
                    </div>
                    <div class="col-md-6">
                      <label>Số điện thoại</label>
                      <input type="text" name="sdt" class="form-control" value="<?php echo $staff->sdt; ?>"disabled>
                    </div>
                    <div class="col-md-6">
                      <label>Ngày đặt</label>
                      <input type="text" name="cart_date" class="form-control" value="<?php echo $staff->cart_date; ?>"disabled>
                    </div>
                    <div class="col-md-6">
                    <label>Tình trạng</label>
                    <select class="form-control" name="tinhtrang" id="custName" onChange="getCustomer(this.value)">
                      <?php
                      if($staff->cart_status==0){ 
                      ?>
                      <option value="3" selected>Giao hàng thành công</option>
                      <option value="2" selected>Đơn đang được giao</option>
                      <option value="1" selected>Đơn được duyệt</option>
                      <option value="0">Đang chờ xử lí</option>
                      <?php
                      }elseif($staff->cart_status==1){ 
                      ?>
                      <option value="3" selected>Giao hàng thành công</option>
                      <option value="2" selected>Đơn đang được giao</option>
                      <option value="1" selected>Đơn được duyệt</option>
                      <?php
                      }elseif($staff->cart_status==2){
                      ?>
                      <option value="3" selected>Giao hàng thành công</option>
                      <option value="2" selected>Đơn đang được giao</option>
                      <?php
                      }elseif($staff->cart_status==3){
                      ?>
                      <option value="3" selected>Giao hàng thành công</option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="UpdateDh" value="Update Đơn hàng" class="btn btn-success" value="">
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
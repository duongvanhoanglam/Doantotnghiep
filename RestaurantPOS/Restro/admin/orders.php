<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $adn = "DELETE FROM tbl_cart WHERE code_cart = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted" && header("refresh:1; url=staff.php");
  } else {
    $err = "Try Again Later";
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
    <!-- Header -->
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
              Quản lí đơn hàng
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã Đơn Hàng</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lí</th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                  <?php
                  $ret = "SELECT * FROM tbl_cart,tbl_user WHERE tbl_cart.id_khachhang=tbl_user.id_user ORDER BY tbl_cart.id_cart";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($prod = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $prod->code_cart; ?></td>
                      <td><?php echo $prod->fullname; ?></td>
                      <td><?php echo $prod->diachicuthe.",".$prod->tinh.",".$prod->tp; ?></td>
                      <td><?php echo $prod->sdt; ?></td>
                      <td><?php echo $prod->cart_date; ?></td>
                      <td><?php 
                        if($prod->cart_status==0){
                            echo "Đang chờ xử lí";
                        }elseif($prod->cart_status==1){
                            echo "Đơn được duyệt";
                        }elseif($prod->cart_status==2){
                            echo "Đơn đang được giao";
                        }else{
                          echo "Giao hàng thành công";
                        }
                       ?></td>
                      <td>
                      <?php if($prod->cart_status==0){
                        echo '<a href="xulydh.php?code='.$prod->code_cart.'">
                            <button class="btn btn-sm btn-primary">
                              <i class="fas fa-check"></i>
                              Check
                            </button></a>';
                        }else{
                          echo '<a href="update_ttdh.php?code='.$prod->code_cart.'">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-handshake"></i>
                            Update Status
                          </button></a>';
                          
                        }?>
                          <a href="orders_reports.php?code=<?php echo $prod->code_cart; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                            Xem đơn hàng
                          </button>
                          <a href="xulydh.php?huy=<?php echo $prod->code_cart; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-window-close"></i>
                            Hủy đơn hàng
                          </button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
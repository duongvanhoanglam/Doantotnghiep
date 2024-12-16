<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

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
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên Sản Phẩm </th>
                    <th scope="col">Mã Sản Phẩm</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Sale</th>
                    <th scope="col">Add_Sale</th>                     
                    <th scope="col">Quản lí</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM tbl_danhmucsp,tbl_brand,tbl_sanpham WHERE  tbl_danhmucsp.id_danhmuc = tbl_sanpham.id_danhmuc AND tbl_sanpham.id_brand = tbl_brand.id_brand ORDER BY tbl_sanpham.id_sanpham";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($cust = $res->fetch_object()) {
                    if($cust->tinhtrang==1 && $cust->sale>1){
                      ?>
                        <tr>
                          <td><?php echo $cust->id_sanpham; ?></td>
                          <td>
                            <?php
                            if ($cust->hinhanh) {
                              echo "<img src='assets/img/products/$cust->hinhanh' height='60' width='60 class='img-thumbnail'>";
                            } else {
                              echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                            }
    
                            ?>
                          </td>
                          <td><?php echo $cust->masp; ?></td>
                          <td><?php echo $cust->tensanpham; ?></td>
                          <td>
                            <?php 
                                if($cust->tinhtrang == 1){
                                    echo "Hiện";
                                }else{
                                    echo "Ẩn ";
                                }
                            ?>
                          </td>
                          <td><?php echo $cust->sale; ?></td>
                          <td>
                          <?php if($cust->add_sale == 0){ ?>
    
                            <a href="xulisale.php?idsanpham=<?php echo $cust->id_sanpham; ?>">
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-user-edit"></i>
                                Thêm
                            </button>
                            </a>
                            <?php }else{?>
    
                            <button class="btn btn-sm btn-primary" disabled>
                                <i class="fas fa-check"></i>
                                Đã thêm
                            </button>
    
                            <?php } ?></td>
                            <td>
                            <?php if($cust->add_sale  == 1) {?>
    
                            <a href="xulisale2.php?idsanpham=<?php echo $cust->id_sanpham; ?>" >
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                Gỡ
                              </button>
                            </a>
                            <?php } ?></td>
    
                        </tr><!-- For more projects: Visit codeastro.com  -->
                      <?php }} ?>
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

</html>
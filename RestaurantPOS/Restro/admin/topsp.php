<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav --><!-- For more projects: Visit codeastro.com  -->
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
<!-- For more projects: Visit codeastro.com  -->
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên Sản Phẩm </th>
                    <th scope="col">Mã Sản Phẩm</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Sale</th>                 
                    <th scope="col">Add hot</th>
                    <th>Quản lí</th>
                    <th></th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                  <?php
                  $ret = $sql_sp = "SELECT * FROM tbl_danhmucsp,tbl_brand,tbl_sanpham WHERE  tbl_danhmucsp.id_danhmuc = tbl_sanpham.id_danhmuc AND tbl_sanpham.id_brand = tbl_brand.id_brand ORDER BY tbl_sanpham.id_sanpham  DESC";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($topsp = $res->fetch_object()) {
                    if($topsp->tinhtrang==1){
                  ?>
                    <tr>
                      <td><?php echo $topsp->id_sanpham; ?></td>
                      <td>
                        <?php
                        if ($topsp->hinhanh) {
                          echo "<img src='assets/img/products/$topsp->hinhanh' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $topsp->masp; ?></td>
                      <td><?php echo $topsp->tensanpham; ?></td>
                      <td>
                        <?php 
                            if($topsp->tinhtrang == 1){
                                echo "Hiện";
                            }else{
                                echo "Ẩn ";
                            }
                        ?>
                      </td>
                      <td><?php echo $topsp->sale; ?></td>
                      <td>
                      <?php if($topsp->add_hot == 0){ ?>

                        <a href="xulihot.php?idsanpham=<?php echo $topsp->id_sanpham; ?>">
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
                        <?php if($topsp->add_hot  == 1) {?>

                        <a href="xulihot2.php?idsanpham=<?php echo $topsp->id_sanpham; ?>" >
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
<!-- For more projects: Visit codeastro.com  -->
</html>
<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $adn = "DELETE FROM  tbl_baiviet  WHERE  id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted" && header("refresh:1; url=baiviet.php");
  } else {
    $err = "Try Again Later";
  }
}
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
              <a href="add_baiviet.php" class="btn btn-outline-success">
                <i class="fas fa-utensils"></i>
                Thêm Bài viết
              </a><!-- For more projects: Visit codeastro.com  -->
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên bài viết </th>
                    <th scope="col">Loại bài viết</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lí</th>
                  </tr>
                </thead><!-- For more projects: Visit codeastro.com  -->
                <tbody>
                  <?php
                  $ret = "SELECT * FROM tbl_danhmucbv,tbl_baiviet WHERE  tbl_danhmucbv.id_danhmuc = tbl_baiviet.id_danhmuc ORDER BY tbl_baiviet.id";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($bv = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $bv->id; ?></td>
                      <td>
                        <?php
                        if ($bv->hinhanh) {
                          echo "<img src='assets/img/anhbaiviet/$bv->hinhanh' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $bv->tenbaiviet; ?></td>
                      <td><?php echo $bv->tendanhmuc_bv; ?></td>
                      <th>
                        <?php 
                            if($bv->tinhtrang == 1){
                                echo "Hiện";
                            }else{
                                echo "Ẩn ";
                            }
                        ?>
                      </th>
                      <td>
                        <a href="baiviet.php?delete=<?php echo $bv->id; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>

                        <a href="update_baiviet.php?update=<?php echo $bv->id;  ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                            Update
                          </button>
                        </a>
                      </td>
                    </tr><!-- For more projects: Visit codeastro.com  -->
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
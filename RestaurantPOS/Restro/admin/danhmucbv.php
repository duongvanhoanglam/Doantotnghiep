<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

//Delete Staff
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $adn = "DELETE FROM  tbl_danhmucbv  WHERE  tbl_danhmucbv.id_danhmuc = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted" && header("refresh:1; url=customes.php");
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
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <a href="add_danhmucbv.php" class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i>
                Thêm danh mục bài viết
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Tên Danh mục bài viết</th>
                    <th scope="col">Quản lí</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM tbl_danhmucbv   ORDER BY id_danhmuc";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($dmbv = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $dmbv->id_danhmuc; ?></td>
                      <td><?php echo $dmbv->tendanhmuc_bv; ?></td>                                          
                      <td>
                        <a href="danhmucbv.php?delete=<?php echo $dmbv->id_danhmuc; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>

                        <a href="update_danhmucbv.php?update=<?php echo $dmbv->id_danhmuc; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-user-edit"></i>
                            Update
                          </button>
                        </a>
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

</html>
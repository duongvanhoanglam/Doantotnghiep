<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

//Delete Staff
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $adn = "DELETE FROM  tbl_admin  WHERE  tbl_admin.id_admin = ?";
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
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <a href="add_staff.php" class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i>
                Thêm nhân viên
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">User Name </th>
                    <th scope="col">password</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Quản lí</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM tbl_admin ORDER BY tbl_admin.id_admin";;
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($cust = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $cust->id_admin; ?></td>
                      <td><?php echo $cust->username; ?></td>
                      <td><?php echo $cust->password; ?></td>
                      <td><?php if($cust->admin_status != 1){ 
                            echo "Nhân viên";
                        }else{
                            echo "Admin";}?></td>
                      <td>
                      <?php if($cust->admin_status != 1){ ?>
                        <a href="staff.php?delete=<?php echo $cust->id_admin; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>
                        <?php } ?>

                        <!-- <a href="updated_staff.php?update=<?php echo $cust->id_admin; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-user-edit"></i>
                            Update
                          </button>
                        </a> -->
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